<?php
// Get current URL
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = dirname($_SERVER['SCRIPT_NAME']);
$route = str_replace($base_path, '', $request_uri);
$route = trim($route, '/');

// Define valid routes
$routes = [
    '' => '../views/home.php', 
    'index' => '../views/home.php', 
    'portfolio' => '../views/home.php#portfolio' 
];

// Check if route exists and include appropriate file
if (array_key_exists($route, $routes)) {
    // If route contains #, redirect to anchor
    if (strpos($routes[$route], '#') !== false) {
        list($file, $anchor) = explode('#', $routes[$route]);
        header('Location: /#' . $anchor);
        exit;
    } else {
        require __DIR__ . '/' . $routes[$route];
    }
} else {
    // Return 404 error for invalid routes
    header("HTTP/1.0 404 Not Found");
    require __DIR__ . '/../views/404.php';
    exit;
}