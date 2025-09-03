<?php
$controller = $_GET['controller'] ?? 'midia';
$action = $_GET['action'] ?? 'index';

if ($controller === 'login') {
    require_once __DIR__ . '/../app/controllers/logincontroller.php';
    $ctrl = new LoginController();
    $ctrl->$action();
} else {

}
