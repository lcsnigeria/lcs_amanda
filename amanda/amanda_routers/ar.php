<?php
require_once 'artd.php';

// Get the requested URI
$request_uri = $amanda_request->get_uri(true);

// Render the appropriate template based on the request
$amanda_router->render_template_if_path_match_property($request_uri, true);