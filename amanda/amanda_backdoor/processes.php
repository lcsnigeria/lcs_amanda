<?php
/**
 * Handles backdoor authentication and file operations.
 * 
 * This function processes authentication requests and file uploads 
 * through a secure backdoor mechanism, allowing step-wise authentication
 * before granting access to sensitive operations.
 */
function amanda_backdoor_processes() {
    global $amanda_request, $amanda_mailer, $amanda_fm, $amanda_creds;

    // Retrieve incoming request data
    $data = $amanda_request->get_request_data();

    try {
        // Define allowed activity states
        $validActivityStates = ['authentication', 'file_upload', 'file_deletion'];

        // Validate activity state
        if (!isset($data['activity_state']) || !in_array($data['activity_state'], $validActivityStates, true)) {
            throw new Exception('🚫 Unauthorized activity detected! Access denied.');
        }

        $activityState = (string) $data['activity_state'];

        // Step 2 Authentication - Validate OTP
        if ($activityState === 'authentication') {
            if (isset($data['access_otp'])) {
                $accessOTP = (int) $data['access_otp'];
                $storedAccessOTP = (int) $amanda_request->get_session_var('AMANDA_BACKDOOR_OTP');

                // Verify OTP match
                if ($accessOTP !== $storedAccessOTP) {
                    throw new Exception('❌ Invalid access OTP! Please check your email and try again.');
                }

                // OTP is valid, remove it from session storage
                $amanda_request->unset_session_var('AMANDA_BACKDOOR_OTP');

                // Generate and store upload nonce for next step
                $genUploadNonce = $amanda_creds->generate_key();
                $amanda_request->set_session_var('AMANDA_BACKDOOR_UPLOAD_NONCE', [
                    'nonce' => $genUploadNonce,
                    'timestamp' => time()
                ]);

                // Send success response for step 2 authentication
                $amanda_request->send_json_success([
                    'upload_nonce' => $genUploadNonce,
                    'response_id' => 'step2_auth',
                    'message' => '✅ Step 2 authentication successful! You may now proceed.'
                ]);
            }

            // Step 1 Authentication - Validate Email & Key
            $accessEmail = $data['access_email'] ?? null;
            $accessKey = $data['access_key'] ?? null;

            if ($accessEmail !== AMANDA_BACKDOOR_EMAIL || $accessKey !== AMANDA_BACKDOOR_ACCESS_KEY) {
                throw new Exception('🔐 Missing or invalid access credentials! Authentication failed.');
            }

            // Generate a one-time password (OTP) for authentication
            $otp = $amanda_creds->generate_code('numbers', 8);
            $amanda_request->set_session_var('AMANDA_BACKDOOR_OTP', $otp);

            // Send OTP via email
            $mailContent = amanda_backdoor_otp_mail_template($otp);
            $amanda_mailer->send($accessEmail, 'Backdoor Access OTP', $mailContent, 'From: LCS Amanda <amanda@lcs.ng>');

            // Send success response for step 1 authentication
            $amanda_request->send_json_success([
                'response_id' => 'step1_auth',
                'message' => '📩 Step 1 authentication successful! OTP has been sent to your backdoor email.'
            ]);
        } 
        
        // Handle File Uploads
        elseif ($activityState === 'file_upload') {
            // Retrieve upload nonce from request
            $uploadNonce = $data['upload_nonce'] ?? '';

            // Check if nonce is expired or missing
            if (is_amanda_backdoor_upload_nonce_expired($uploadNonce)) {
                $amanda_request->unset_session_var('AMANDA_BACKDOOR_UPLOAD_NONCE');
                throw new Exception('⏳ Upload session expired! Please re-authenticate to continue. <button type="button" onclick="resetBackdoorForm();">Click here</button> or reload the page.');
            }

            // Ensure files are provided
            if (!isset($data['template_files'])) {
                throw new Exception('📂 No files selected! Please choose a valid file and try again.');
            }

            $templateFiles = $data['template_files'];
            $overwriteTemplateFiles = isset($data['overwrite_template_files']) && $data['overwrite_template_files'] == '1' ? true : false;

            // Reset file manager properties before processing
            $amanda_fm->resetProperties();
            $amanda_fm->file_types = ["application/x-httpd-php", "text/x-php", "text/html", "application/xhtml+xml"];
            $amanda_fm->file = $templateFiles;
            $amanda_fm->path = AMANDA_TEMPLATE_DIR;
            $amanda_fm->rename = false;
            $amanda_fm->overwrite = $overwriteTemplateFiles;
            $amanda_fm->upload();
            $amanda_fm->resetProperties();

            // Send success response
            $amanda_request->send_json_success([
                'response_id' => 'template_file_upload',
                'message' => '🎉 Template file(s) uploaded successfully!'
            ]);
        }
    } catch (\Exception $e) {
        // Send error response with the caught exception message
        $amanda_request->send_json_error($e->getMessage());
    }
}

// Register function to handle AJAX requests
amanda_add_action('amanda_ajax__amandaBackdoorProcesses', 'amanda_backdoor_processes');

/**
 * Checks if the backdoor upload nonce is expired.
 *
 * @param string $nonce The nonce value to verify.
 * @return bool True if the nonce is expired or invalid, otherwise false.
 */
function is_amanda_backdoor_upload_nonce_expired($nonce) {
    global $amanda_request;
    $nonce = (string) $nonce;

    // Retrieve stored nonce data
    $nonceData = $amanda_request->get_session_var('AMANDA_BACKDOOR_UPLOAD_NONCE');

    // Validate nonce existence
    if (!$nonceData) {
        return true;
    }

    // Ensure nonce matches the stored one
    if (!isset($nonceData['nonce']) || $nonceData['nonce'] !== $nonce) {
        return true;
    }

    // Validate expiration time
    $currentTime = time();
    $nonceTimestamp = $nonceData['timestamp'] ?? 0;

    return ($currentTime - $nonceTimestamp) >= 10 * 60; // if past or 10 minutes
}