<?php
session_start();
require_once "../app/models/conexao.php";
require_once "../app/models/usuario.php";

$erro = "";
$sucesso = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome  = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);

    if (!empty($nome) && !empty($email) && !empty($senha)) {
        try {
            $usuario = new Usuario();
            
        
            if ($usuario->buscarPorEmail($email)) {
                $erro = "Este e-mail já está cadastrado.";
            } else {
            
                $hash = password_hash($senha, PASSWORD_DEFAULT);
                $usuario->criar($nome, $email, $hash);
                $sucesso = "Cadastro realizado com sucesso! Você já pode fazer login.";
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
    <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Criar Conta</h2>

        <?php if ($erro): ?>
            <p style="color:red;"><?= $erro ?></p>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <p style="color:green;"><?= $sucesso ?></p>
            <a href="login.php">Ir para Login</a>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="nome" placeholder="Nome completo" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>

        <p>Já tem conta? <a href="login.php">Faça login aqui</a></p>
    </div>
</body>
</html>