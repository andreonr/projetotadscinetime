<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cine Time</title>
  <link rel="stylesheet" href="/public/assets/css/login.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="/public/index.php">Início</a></li>
        <li><a href="/public/catalogo.php">Catálogo</a></li>
        <li><a href="/public/perfil.php">Perfil</a></li>
        <li><a href="/public/logout.php">Sair</a></li>
      </ul>
    </nav>
  </header>