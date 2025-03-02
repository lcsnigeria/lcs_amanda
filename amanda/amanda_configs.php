<?php
/**
 * LCS Amanda
 * 
 * Copyright (c) 2025 - Loaded Channel Solutions
 * Licensed under the MIT License. See LICENSE file for details.
 * 
 * @package LCS Amanda
 * @version 1.0.0
 * @license MIT
 * @author LOADED CHANNEL SOLUTIONS LTD, Chinonso Justice
 * @link https://lcs.ng/amanda
 */


/**
 * Define time zone
 */
date_default_timezone_set('Africa/Lagos');

/**
 * Amanda backdoor email
 */
define('AMANDA_BACKDOOR_EMAIL', 'justicefrewen@gmail.com'); // Please change this to your desired email address.

/**
 * Amanda backdoor access key
 */
define(
    'AMANDA_BACKDOOR_ACCESS_KEY', 
    'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJhbmRyZWFzQGxjcy5uZyIsImlzcyI6Imxjcy5uZyIsImlhdCI6MTYyMzUwNjYwMH0.7Z6'
); // Please change this to your own generated access key. You can generate one at https://lcs.ng/generate-rands/mixed/64

/**
 * Amanda logo.
 */
define('AMANDA_LOGO', '/amanda_assets/oa/img/AMANDA-Icon.png');

/**
 * Amanda logo text.
 */
define('AMANDA_LOGO_TEXT', '/amanda_assets/oa/img/AMANDA-IconText.png');

/**
 * Includes the Amanda official configuration file.
 * Do not edit this line and the file it includes.
 */
require_once 'amanda_oc.php';