<?php
/**
 * LCS Amanda
 * 
 * Copyright (c) 2025 - Loaded Channel Solutions
 * Licensed under the MIT License. See LICENSE file for details.
 * 
 * Please do not edit this file unless you know what you are doing.
 * 
 * @package LCS Amanda
 * @version 1.0.0
 * @license MIT
 * @author LOADED CHANNEL SOLUTIONS LTD, Chinonso Justice
 * @link https://lcs.ng/amanda
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amanda Backdoor Management</title>
    <meta name="description" content="Manage your website files">
    <meta name="author" content="Loaded Channel Solutions, Chinonso Justice">
    <?php echo AMANDA_AJAX_OBJECT_META; ?>
    <?php echo amanda_favicon(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/lcs_ajax/dist/la.min.js"></script>
    <script src="<?php echo amanda_oa_dir('/js/ajax.js'); ?>"></script>
    <script src="<?php echo amanda_oa_dir('/js/backdoor.js'); ?>"></script>
</head>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    body {
        font-family: 'Roboto', sans-serif;
        font-size: 1rem;
        line-height: 1.5;
        color: #333;
    }
    header {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    .amanda-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 90px;
        width: 90px;
        min-width: 90px;
    }
    .amanda-logo img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    main {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    main > div {
        width: 100%;
        max-width: 500px;
        min-width: 400px;
        padding: 2rem;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    main > div > h2 {
        margin-bottom: 1rem;
        text-align: center;
    }
    main form > div {
        margin-bottom: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        align-items: start;
    }
    main form > div > label {
        font-size: 1rem;
        font-weight: 400;
    }
    main form > div > input {
        padding: 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
    }
    main form > div > input:hover {
        border-color: #2146dc;
    }
    main form > div > input:focus {
        outline: 1px solid #2146dc;
        border-color: #2146dc;
    }
    div:has(> #overwrite_template_files) {
        display: flex;
        align-items: center;
        justify-content: start;
        position: relative;
    }
    input#overwrite_template_files {
        visibility: hidden;
    }
    input#overwrite_template_files::before {
        content: '';
        display: flex;
        align-items: center;
        justify-content: center;
        height: 16px;
        width: 16px;
        min-width: 16px;
        border: 2px solid #2146dc;
        border-radius: 4px;
        visibility: visible;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 10px;
    }
    input#overwrite_template_files:checked::before {
        content: '\2714';
        background-color: #2146dc;
        color: #fff;
    }
    main form label[for="overwrite_template_files"] {
        margin-left: 1rem;
    }
    main form > button {
        padding: 0.875rem;
        border: none;
        border-radius: 5px;
        background-color: #2146dc;
        color: #fff;
        font-size: 1.125rem;
        font-weight: 600;
        cursor: pointer;
        width: 100%;
        text-align: center;
    }
    .backdoor-form-alert {
        overflow-wrap: anywhere;
    }
    .backdoor-form-alert button {
        border: none;
        background-color: inherit;
        color: inherit;
        font-size: inherit;
        font-weight: inherit;
        text-decoration: 2px underline;
        cursor: pointer;
    }
</style>
<body>

<header>
    <h1 class="amanda-logo" aria-label="Amanda Logo">
        <img src="<?php echo AMANDA_LOGO_TEXT; ?>" alt="LCS AMANDA">
    </h1>
</header>

<main>
    <div id="backdoor-form-container">
        <h2 id="backdoor-header-title">Enter your access credentials</h2>
        <form id="backdoor-form">
            <div>
                <label for="access_email">Email Address</label>
                <input type="email" id="access_email" name="access_email" required>
            </div>

            <div>
                <label for="access_key">Access Key</label>
                <input type="text" id="access_key" name="access_key" required>
            </div>

            <button id="backdoor-action-btn" data-activity_state="authentication" type="submit">Continue</button>
        </form>
    </div>
</main>
    
</body>
</html>