<?php
// Obtém a URL atual
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = dirname($_SERVER['SCRIPT_NAME']);
$route = str_replace($base_path, '', $request_uri);
$route = trim($route, '/');

// Define as rotas válidas
$routes = [
    '' => '../views/home.php', 
    'index' => '../views/home.php', 
    'portfolio' => '../views/home.php#portfolio' 
];

// Verifica se a rota existe e inclui o arquivo apropriado
if (array_key_exists($route, $routes)) {
    // Se a rota contém um #, faz redirecionamento para a âncora
    if (strpos($routes[$route], '#') !== false) {
        list($file, $anchor) = explode('#', $routes[$route]);
        header('Location: /#' . $anchor);
        exit;
    } else {
        require __DIR__ . '/' . $routes[$route];
    }
} else {
    // Retorna um erro 404 para rotas inválidas
    header("HTTP/1.0 404 Not Found");
    require __DIR__ . '/../views/404.php';
    exit;
}