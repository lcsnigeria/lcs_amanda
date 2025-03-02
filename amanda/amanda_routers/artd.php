<?php
/**
 * Default definitions for the template directory and 404 error template. 
 */ 
$amanda_router->template_dir = AMANDA_TEMPLATE_DIR;  
$amanda_router->error_404 = AMANDA_TEMPLATE_DIR . '/404.html';  

/**  
 * You can set other template paths or override the default definitions below,  
 * such as changing the home or error_404 template.  
 *  
 * Examples:  
 * - $amanda_router->home = AMANDA_TEMPLATE_DIR . '/home2.php';  
 * - $amanda_router->error_404 = AMANDA_TEMPLATE_DIR . '/newError404.php';  
 * - $amanda_router->add_template = ['cart' => AMANDA_TEMPLATE_DIR . '/cart.php'];  
 */  
$amanda_router->add_template = ['cart' => AMANDA_TEMPLATE_DIR . '/cart.php'];