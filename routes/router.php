<?php
function app_url(string $path): string
{
    $basePath = dirname($_SERVER['SCRIPT_NAME']);
    $basePath = $basePath === '/' ? '' : $basePath;

    return $basePath . '/' . trim($path, '/');
}

function auth(){
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: ' . app_url('/login'));
        exit;
    }
}

function guest(){
    if (isset($_SESSION['usuario_id'])) {
        header('Location: ' . app_url('/dashboard'));
        exit;
    }
}

function load(string $controller, string $action = 'index'){
    try {
        $controllerNamespace = "app\\controllers\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("O Controller {$controller} não existe");
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("O método {$action} não existe no controller {$controller}");
        }

        $controllerInstance->$action();

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

return [
    "GET" => [
        "/" => function () {
            auth();
            load("HomeController", "index");
        },

        "/dashboard" => function () {
            auth();
            load("HomeController", "index");
        },

        "/produto" => function () {
            auth();
            load("ProdutoController", "index");
        },

        "/produto/create" => function () {
            auth();
            load("ProdutoController", "form");
        },

        "/login" => function () {
            guest();
            load("AuthController", "login");
        },

        "/logout" => function () {
            load("AuthController", "logout");
        },
    ],

    "POST" => [
        "/login" => function () {
            guest();
            load("AuthController", "authenticate");
        },

        "/produto" => function () {
            auth();
            load("ProdutoController", "create");
        },
    ],
];
?>
