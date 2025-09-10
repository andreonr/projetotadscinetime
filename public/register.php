<?php
session_start();
require_once "../app/models/conexao.php";
require_once "../app/models/usuario.php";

$erro = "";
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome      = trim($_POST["nome"]);
    $sobrenome = trim($_POST["sobrenome"]);
    $email     = trim($_POST["email"]);
    $cpf       = trim($_POST["cpf"]);
    $senha     = trim($_POST["senha"]);

    if (!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($cpf) && !empty($senha)) {
        try {
            $usuario = new Usuario();

            // verificar se ja existe email
            if ($usuario->buscarPorEmail($email)) {
                $erro = "Este e-mail já está cadastrado.";
            } 
            // validar o cpf
            elseif (!preg_match('/^\d{3}\.?\d{3}\.?\d{3}-?\d{2}$/', $cpf)) {
                $erro = "CPF inválido! Use o formato 000.000.000-00.";
            } 
            else {
                $hash = password_hash($senha, PASSWORD_DEFAULT);
                $usuario->criarUsuario($nome . " " . $sobrenome, $email, $hash, $cpf);

                //vai direto para a pagina de login
                header("Location: /projetotadscinetime/public/index.php?cadastro=sucesso");
                exit;
            }
        } catch (Exception $e) {
            $erro = "Erro ao cadastrar: " . $e->getMessage();
        }
    } else {
        $erro = "Preencha todos os campos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - CineTime</title>
    <link rel="stylesheet" href="/projetotadscinetime/public/assets/css/register.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="login-box">

        <h2>
          <img src="/projetotadscinetime/public/assets/images/cinetimelogo2.png" alt="Logo CineTime" class="logo">
        </h2>
        <h3>Criar Conta</h3>

        <?php if ($erro): ?>
            <div class="error-box"><?= $erro ?></div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div class="success-box"><?= $sucesso ?></div>
            <a href="/projetotadscinetime/public/index.php">Ir para Login</a>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" placeholder="Seu nome" required>
            </div>

            <div class="form-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" placeholder="Seu sobrenome" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="seuemail@exemplo.com" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" placeholder="000.000.000-00" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Sua senha" required>
            </div>

            <button type="submit" class="btn-login" href="/projetotadscinetime/public/index.php">Cadastrar</button>
        </form>

        <p class="small">Já tem conta? <a href="/projetotadscinetime/public/index.php">Faça login aqui</a></p>
    </div>
</body>
</html>
