<?php
session_start();
require_once __DIR__ . '/../config/database.php';

// Autoload das classes
spl_autoload_register(function ($class_name) {
    $directories = [
        '../app/models/',
        '../app/controllers/',
        '../config/'
    ];
    
    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Roteamento simples
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Remove o diretório base se necessário
$basePath = '/cinetime/public';
if (strpos($path, $basePath) === 0) {
    $path = substr($path, strlen($basePath));
}

switch ($path) {
    case '/':
    case '/home':
        if (isset($_SESSION['user_id'])) {
            $controller = new MovieController();
            $controller->index();
        } else {
            header('Location: /login');
            exit();
        }
        break;
    
    case '/login':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login();
        } else {
            $controller->showLogin();
        }
        break;
        
    case '/register':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->register();
        } else {    
            $controller->showRegister();
        }
        break;
    
    case '/logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    
    case '/movie':
        if (isset($_SESSION['user_id'])) {
            $controller = new MovieController();
            if (isset($_GET['id'])) {
                $controller->show($_GET['id']);
            } else {
                $controller->index();
            }
        } else {
            header('Location: /login');
            exit();
        }
        break;
    
    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}
?>

