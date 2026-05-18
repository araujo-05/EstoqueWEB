<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

$routes = require_once __DIR__ . '/../routes/router.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = dirname($_SERVER['SCRIPT_NAME']);

if ($basePath !== '/' && str_starts_with($uri, $basePath)) {
    $uri = substr($uri, strlen($basePath));
}

$uri = '/' . trim($uri, '/');

if ($uri === '//') {
    $uri = '/';
}

if (isset($routes[$method][$uri])) {
    $routes[$method][$uri]();
    exit;
}

http_response_code(404);
echo "Página não encontrada";
?>
