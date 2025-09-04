<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /public/index.php?controller=login&action=index");
    exit;
}
$usuario = $_SESSION['usuario'];
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Dashboard - CineTime</title>
</head>
<body style="background:#0b0d10; color:#fff; font-family:sans-serif; text-align:center; padding:50px;">
  <h1>Bem-vindo(a), <?= htmlspecialchars($usuario['nome']) ?>!</h1>
  <p>Você está logado na plataforma de streaming CineTime 🍿</p>
  <a href="/public/index.php?controller=login&action=sair" style="color:#ff4d4d;">Sair</a>
</body>
</html>
