<?php
session_start();

$pagina = basename($_SERVER['PHP_SELF']);
$controller = $_GET['controller'] ?? null;
$action = $_GET['action'] ?? null;

if (!isset($_SESSION['usuario_id']) 
    && $pagina !== 'login_index.php' 
    && !($controller === 'login')) {
    header("Location: login_index.php");
    exit;
}


