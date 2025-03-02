/**
 * Initializes the backdoor form event listener when the DOM is fully loaded.
 * 
 * This script listens for form submission on the backdoor form, validates the activity state,
 * sends an AJAX request using `amandaAjaxRequest`, and processes the response accordingly.
 */
document.addEventListener("DOMContentLoaded", () => {
    // Get the backdoor form element
    const backdoorForm = document.getElementById("backdoor-form");
    
    if (!backdoorForm) return;

    /**
     * Handles form submission, validates activity state, sends an AJAX request,
     * and processes the server response.
     * 
     * @param {Event} e - The form submit event.
     */
    backdoorForm.addEventListener("submit", (e) => {
        e.preventDefault(); // Prevent default form submission

        // Get the submit button
        const submitButton = backdoorForm.querySelector('#backdoor-action-btn');
        if (!submitButton) {
            console.error("Submit button not found.");
            return;
        }

        // Validate the activity state
        const activityState = submitButton.dataset.activity_state;
        const validActivityStates = ['authentication', 'file_upload', 'file_deletion'];

        if (!validActivityStates.includes(activityState)) {
            backdoorFormAlert('Unauthorized activity', 'error');
            return;
        }

        // Prepare form data
        const formData = new FormData(backdoorForm);
        formData.append('action', '_amandaBackdoorProcesses');
        formData.append('activity_state', activityState);

        // Modify & Manipulate some data before sending request
        if (activityState === 'file_upload') {
            const overwriteTemplateFile = backdoorForm.querySelector('#overwrite_template_files');
            if (overwriteTemplateFile && overwriteTemplateFile.checked) {
                formData.set('overwrite_template_files', '1');
            }
        }

        // Create and send AJAX request
        const ajaxRequest = new amandaAjaxRequest(formData);

        // Disable & Update button text to indicate loading state
        submitButton.textContent = 'Loading...';
        submitButton.disabled = true;

        ajaxRequest.send()
            .then((response) => {
                if (!response.success) {
                    backdoorFormAlert(response.data, 'error');
                    return;
                }

                // Clear alerts
                clearBackdoorFormAlert();

                // Extract response data
                const responseData = response.data || null;
                if (!responseData) {
                    console.error('Missing or invalid response data.');
                    return;
                }

                // Handle response based on response_id
                switch (responseData.response_id) {
                    case 'step1_auth':
                        createAmandaBackdoorOTPField(backdoorForm);
                        break;

                    case 'step2_auth':
                        // Handle OTP authentication response
                        const uploadNonce = responseData.upload_nonce || null;
                        if (!uploadNonce) {
                            console.error("🚨 Bad server response: The sacred 'upload_nonce' is nowhere to be found! Summon it and try again.");
                            backdoorFormAlert("Oops! Something went missing. We need a security token to proceed. Please retry.", 'error');
                            return;
                        }
                        createAmandaBackdoorTemplateFileUploadField(backdoorForm, uploadNonce);
                        break;

                    case 'template_file_upload':
                        // Handle template file upload response
                        backdoorFormAlert('Template file uploaded successfully. You can upload more files.', 'success');
                        const formFileInputElement = backdoorForm.querySelector('#template_files');
                        if (formFileInputElement) {
                            formFileInputElement.value = '';
                        }
                        break;

                    case 'file_deletion':
                        // Handle file deletion response (if needed)
                        break;
                    default:
                        console.warn('Unhandled response_id:', responseData.response_id);
                        break;
                }
            })
            .catch((error) => {
                console.error("Error authenticating backdoor access:", error);
            })
            .finally(() => {
                // Re-enable button after request completes
                submitButton.disabled = false;
                if (activityState === 'file_upload') {
                    submitButton.textContent = 'Upload';
                } else {
                    submitButton.textContent = 'Continue';
                }
            });
    });
});


/**
 * Displays a styled alert message inside the backdoor form container.
 *
 * @param {string} message - The message to display.
 * @param {string} [type='notice'] - The type of message ('notice', 'error', 'success').
 */
function backdoorFormAlert(message, type = 'notice') {
    const msgParagraph = document.createElement('p');
    msgParagraph.className = 'backdoor-form-alert';
    msgParagraph.innerHTML = message;
    msgParagraph.style.margin = '10px auto';
    msgParagraph.style.fontWeight = 'bold';
    msgParagraph.style.textAlign = 'center';
    
    // Styling based on type
    switch (type) {
        case 'error':
            msgParagraph.style.color = '#ff0000'; // Red
            break;
        case 'success':
            msgParagraph.style.color = '#388E3C'; // Green
            break;
        default:
            msgParagraph.style.color = '#333';
    }

    const backdoorFormContainer = document.getElementById('backdoor-form-container');
    if (!backdoorFormContainer) {
        alert('⚠ Form Container is missing!');
        console.error('Error: Element with ID "backdoor-form-container" not found.');
        return;
    }

    // Insert the message at the top of the container
    backdoorFormContainer.insertAdjacentElement('afterbegin', msgParagraph);
}

function clearBackdoorFormAlert() {
    const backdoorFormAlerts = document.querySelectorAll('.backdoor-form-alert');
    backdoorFormAlerts.forEach(element => element.remove());
}


/**
 * Creates an OTP input field inside a form for backdoor access.
 * 
 * This function modifies the provided form by removing all existing div elements
 * and inserting a new input field for OTP verification. It also updates the header title
 * to prompt the user to enter the OTP sent to their email.
 * 
 * @param {HTMLFormElement} formElement - The form element to modify.
 */
function createAmandaBackdoorOTPField(formElement) {

    // Validate that the provided argument is a valid form element
    if (!(formElement instanceof HTMLElement) || formElement.tagName.toLowerCase() !== 'form') {
        console.error("Invalid form element provided");
        return;
    }

    // Check if the OTP input field already exists
    if (formElement.querySelector('#access_otp')) {
        return;
    }

    // Locate the main container and update the header title
    const backdoorMainElement = formElement.closest('main');
    const backdoorHeaderTitleElement = backdoorMainElement.querySelector('#backdoor-header-title');
    if (backdoorHeaderTitleElement) {
        backdoorHeaderTitleElement.textContent = 'Enter the OTP sent to your email';
    }

    // Remove all existing div elements inside the form
    const allFormDivs = backdoorMainElement.querySelectorAll('#backdoor-form > div');
    allFormDivs.forEach(element => element.remove());

    // Create a new div element with an OTP input field
    const newFormDiv = document.createElement('div');
    const newFormDivInput = document.createElement('input');
    newFormDivInput.type = 'number';
    newFormDivInput.name = 'access_otp';
    newFormDivInput.id = 'access_otp';
    newFormDivInput.required = true;

    // Create a label for the input field
    const newFormDivInputLabel = document.createElement('label');
    newFormDivInputLabel.setAttribute('for', 'access_otp');
    newFormDivInputLabel.textContent = 'OTP'; // Provide a label text

    // Append the label and input to the new div
    newFormDiv.append(newFormDivInputLabel, newFormDivInput);

    // Insert the newly created div at the beginning of the form
    formElement.insertAdjacentElement('afterbegin', newFormDiv);

    // Update submit button activity state & text contents
    const submitButton = formElement.querySelector('#backdoor-action-btn');
    submitButton.dataset.activity_state = 'authentication';
    submitButton.textContent = 'Continue';
}

/**
 * Creates and appends a required template file upload input field to the provided form element.
 * 
 * @param {HTMLElement} formElement - The form element to which the upload field will be added.
 * @param {string} uploadNonce - A security nonce to validate the upload request.
 */
function createAmandaBackdoorTemplateFileUploadField(formElement, uploadNonce) {
    if (!(formElement instanceof HTMLElement) || formElement.tagName.toLowerCase() !== 'form') {
        console.error("Invalid form element provided");
        return;
    }

    // Check if the file input already exists
    if (formElement.querySelector('#template_files')) {
        return;
    }

    // Get the main container and update the header title
    const backdoorMainElement = formElement.closest('main');
    const backdoorHeaderTitleElement = backdoorMainElement.querySelector('#backdoor-header-title');
    if (backdoorHeaderTitleElement) {
        backdoorHeaderTitleElement.textContent = 'Select template files to upload';
    }

    // Remove all existing form divs
    const allFormDivs = backdoorMainElement.querySelectorAll('#backdoor-form > div');
    allFormDivs.forEach(element => element.remove());

    // Create new div with file input
    const newFormFileInputDiv = document.createElement('div');
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.name = 'template_files';
    fileInput.id = 'template_files';
    fileInput.multiple = true;
    fileInput.accept = '.html, .php';
    fileInput.required = true; // Makes the file input required

    // Create checkbox input
    const overwriteFileInput = document.createElement('input');
    overwriteFileInput.type = 'checkbox';
    overwriteFileInput.name = 'overwrite_template_files';
    overwriteFileInput.id = 'overwrite_template_files';

    // Insert file input and overwrite checkbox into the new div
    newFormFileInputDiv.innerHTML = `
        ${fileInput.outerHTML}
        <div>${overwriteFileInput.outerHTML}<label for="overwrite_template_files">Overwrite</label></div>
    `;

    // Create hidden input for uploadNonce
    const uploadNonceInput = document.createElement('input');
    uploadNonceInput.type = 'hidden';
    uploadNonceInput.name = 'upload_nonce';
    uploadNonceInput.value = uploadNonce;

    // Insert the new form div into the form
    formElement.insertAdjacentHTML('afterbegin', newFormFileInputDiv.outerHTML + uploadNonceInput.outerHTML);

    // Update submit button activity state & text contents
    const submitButton = formElement.querySelector('#backdoor-action-btn');
    submitButton.dataset.activity_state = 'file_upload';
    submitButton.textContent = 'Upload';
}


/**
 * Resets the backdoor form to its default state (authentication state).
 */
function resetBackdoorForm() {
    const backdoorForm = document.getElementById('backdoor-form');
    if (!backdoorForm) {
        console.error('Backdoor form not found.');
        return;
    }

    // Clear all alerts
    clearBackdoorFormAlert();

    // Reset form fields
    clearUploadNonceField();
    backdoorForm.reset();

    // Remove all existing div elements inside the form
    const allFormDivs = backdoorForm.querySelectorAll('div');
    allFormDivs.forEach(element => element.remove());

    // Recreate the default form fields
    const emailDiv = document.createElement('div');
    const emailLabel = document.createElement('label');
    emailLabel.setAttribute('for', 'access_email');
    emailLabel.textContent = 'Email Address';
    const emailInput = document.createElement('input');
    emailInput.type = 'email';
    emailInput.id = 'access_email';
    emailInput.name = 'access_email';
    emailInput.required = true;
    emailDiv.append(emailLabel, emailInput);

    const keyDiv = document.createElement('div');
    const keyLabel = document.createElement('label');
    keyLabel.setAttribute('for', 'access_key');
    keyLabel.textContent = 'Access Key';
    const keyInput = document.createElement('input');
    keyInput.type = 'text';
    keyInput.id = 'access_key';
    keyInput.name = 'access_key';
    keyInput.required = true;
    keyDiv.append(keyLabel, keyInput);

    backdoorForm.prepend(emailDiv, keyDiv);

    // Update header title
    const backdoorHeaderTitleElement = document.getElementById('backdoor-header-title');
    if (backdoorHeaderTitleElement) {
        backdoorHeaderTitleElement.textContent = 'Enter your access credentials';
    }

    // Update submit button activity state & text contents
    const submitButton = backdoorForm.querySelector('#backdoor-action-btn');
    if (submitButton) {
        submitButton.dataset.activity_state = 'authentication';
        submitButton.textContent = 'Continue';
    }
}

/**
 * Clears all upload nonce hidden fields from the backdoor form.
 */
function clearUploadNonceField() {
    const backdoorForm = document.getElementById('backdoor-form');
    if (!backdoorForm) {
        console.error('Backdoor form not found.');
        return;
    }

    const uploadNonceFields = backdoorForm.querySelectorAll('input[name="upload_nonce"]');
    if (uploadNonceFields.length > 0) {
        uploadNonceFields.forEach(field => field.remove());
    }
}
