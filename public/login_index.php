<?php
session_start();

// mensagem de sucesso após cadastro
$mensagem = "";
if (isset($_GET['cadastro']) && $_GET['cadastro'] === "sucesso") {
    $mensagem = "Cadastro realizado com sucesso! Faça login para continuar.";
}

// erro vindo do controller
$erro = isset($_GET['erro']) ? "E-mail ou senha inválidos!" : "";
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>CineTime - Entrar</title>
  <link rel="stylesheet" href="/projetotadscinetime/public/assets/css/login.css">
</head>
<body>
  <div class="overlay"></div>
  <div class="login-box">

    <h2>
      <img src="/projetotadscinetime/public/assets/images/cinetimelogo2.png" alt="Logo CineTime" class="logo">
    </h2>

    <?php if (!empty($mensagem)): ?>
      <div class="success-box">
        <?= $mensagem ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($erro)): ?>
      <div class="error-box">
        <?= $erro ?>
      </div>
    <?php endif; ?>

    <!-- Formulário de login -->
    <form method="post" action="/projetotadscinetime/public/index.php?controller=login&action=autenticar">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="seuemail@exemplo.com" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Sua senha" required>
      </div>
      <button type="submit" class="btn-login">Entrar</button>
    </form>

    <p class="small">Não tem conta? <a href="/projetotadscinetime/public/register.php">Cadastre-se</a></p>
  </div>
</body>
</html>
