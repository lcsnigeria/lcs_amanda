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


require_once 'amanda_configs.php';

// Load the routing file if not ajax
if (!$amanda_request->is_ajax_request()) {
    require_once 'amanda_routers/ar.php';
}

/**
 * Amanda Offical Assets directory
 * 
 * @param string $path The path to child directory or file in the OA directory.
 * @return string The path to the directory.
 */
function amanda_oa_dir($path = null) {
    if ($path) {
        $path = ltrim($path, '/');
        return AMANDA_OA_DIR . '/' . $path;
    }
    return AMANDA_OA_DIR;
}

/**
 * Amanda function to output the favicon links.
 * 
 * @return string The favicon links.
 */
function amanda_favicon() {
    $output = '';
    $linkAtts = [
        ['rel' => 'apple-touch-icon', 'sizes' => '180x180', 'href' => amanda_oa_dir('/favicon') . '/apple-touch-icon.png'],
        ['rel' => 'icon', 'type' => 'image/png', 'sizes' => '32x32', 'href' => amanda_oa_dir('/favicon') . '/favicon-32x32.png'],
        ['rel' => 'icon', 'type' => 'image/png', 'sizes' => '16x16', 'href' => amanda_oa_dir('/favicon') . '/favicon-16x16.png'],
        ['rel' => 'manifest', 'href' => amanda_oa_dir('/favicon') . '/site.webmanifest']
    ];

    foreach ($linkAtts as $att) {
        $output .= '<link';
        foreach ($att as $key => $value) {
            $output .= ' ' . $key . '="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"';
        }
        $output .= '>' . PHP_EOL;
    }

    return $output;
}

/**
 * Registers a new action hook in the Amanda hook system.
 *
 * @param string   $hook_name     The name of the hook to which the callback should be attached.
 * @param callable $callback      The function to execute when the hook is triggered.
 * @param int      $priority      Optional. The priority of the function execution. Default is 10.
 * @param int      $accepted_args Optional. The number of arguments the callback function accepts. Default is 1.
 * 
 * @return void
 */
function amanda_add_action($hook_name, $callback, $priority = 10, $accepted_args = 1) {
    global $amanda_hooks;
    $amanda_hooks->add_action($hook_name, $callback, $priority, $accepted_args);
}

/**
 * Checks if a specific action hook has been registered.
 *
 * @param string        $hook_name The name of the hook to check.
 * @param callable|bool $callback  Optional. The specific callback function to check for. If false, checks if any callback exists for the hook.
 * 
 * @return bool True if the action exists, false otherwise.
 */
function amanda_has_action($hook_name, $callback = false) {
    global $amanda_hooks;
    return $amanda_hooks->has_action($hook_name, $callback);
}

/**
 * Executes all callback functions attached to a specific action hook.
 *
 * @param string $hook_name The name of the hook to trigger.
 * @param mixed  ...$arg    Optional. Arguments to pass to the callback functions.
 * 
 * @return void
 */
function amanda_do_action($hook_name, ...$arg) {
    global $amanda_hooks;
    $amanda_hooks->do_action($hook_name, $arg);
}

/**
 * This script includes additional Amanda functions by requiring the specified files.
 * 
 * @var array $addAmandaFunctions An array containing the file paths of Amanda functions to be included.
 * 
 * The script iterates over the $addAmandaFunctions array and requires each file.
 * 
 * Included files:
 * - 'amanda_mailing/backdoor_otp_mailer_template.php': This file contains the OTP mailer template function for Amanda.
 */
$addAmandaFunctions = [
    'amanda_mailing/backdoor_otp_mailer_template.php',
    'amanda_backdoor/processes.php'
];
foreach ( $addAmandaFunctions as $func ) {
    require_once ( $func );
}