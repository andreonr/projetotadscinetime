<?php
require_once __DIR__ . '/../models/Usuario.php';

class LoginController {
    public function index() {
        require __DIR__ . '/../views/login.php';
    }

    public function autenticar() {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->autenticar($email, $senha);

        if ($usuario) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: ../../public/dashboard.php");
            exit;
        } else {
            $erro = "E-mail ou senha inválidos!";
            require __DIR__ . '/../views/login.php';
        }
    }
}
