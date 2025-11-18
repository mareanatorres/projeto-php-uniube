<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../app/Config/Database.php';

spl_autoload_register(function($class){
    $paths = [
      __DIR__ . '/../app/Controllers/',
      __DIR__ . '/../app/Models/',
      __DIR__ . '/../app/DAO/',
      __DIR__ . '/../app/Core/'
    ];
    foreach ($paths as $p) {
        $file = $p . $class . '.php';
        if (file_exists($file)) { require_once $file; return; }
    }
});

$controller = $_GET['c'] ?? $_GET['path'] ?? 'dashboard';
$action = $_GET['a'] ?? 'index';

if (strpos($controller, '/') !== false) {
    $parts = explode('/', trim($controller, '/'));
    $controller = $parts[0] ?? 'dashboard';
    $action = $parts[1] ?? 'index';
}

$controllerClass = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . "/../app/Controllers/{$controllerClass}.php";

if (!file_exists($controllerFile)) {
    http_response_code(404);
    echo "Controller não encontrado.";
    exit;
}

require_once $controllerFile;
$ctrl = new $controllerClass();

if (!method_exists($ctrl, $action)) {
    http_response_code(404);
    echo "Ação não encontrada.";
    exit;
}

$ctrl->{$action}();
