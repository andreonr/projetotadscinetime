<?php
session_start();

$pagina = basename($_SERVER['PHP_SELF']);
$controller = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? null;

// Se não estiver logado e não for login, redireciona
if (!isset($_SESSION['usuario_id']) 
    && $pagina !== 'login_index.php' 
    && !($controller === 'login')) {
    header("Location: login_index.php");
    exit;
}

// --- 🚀 Roteador simples ---
if ($controller && $action) {
    $controllerName = ucfirst($controller) . "Controller";
    $controllerFile = __DIR__ . "../../controllers/logincontroller.php" . $controllerName . ".php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        if (class_exists($controllerName)) {
            $objController = new $controllerName();

            if (method_exists($objController, $action)) {
                $objController->$action();
                exit;
            } else {
                http_response_code(404);
                echo "Ação '$action' não encontrada no controller '$controllerName'.";
                exit;
            }
        } else {
            http_response_code(404);
            echo "Controller '$controllerName' não encontrado.";
            exit;
        }
    } else {
        http_response_code(404);
        echo "Arquivo de controller não encontrado: $controllerFile";
        exit;
    }
}

// Se não tiver controller/action, carrega página padrão
require __DIR__ . "/../views/home.php";
