<?php
session_start();
require_once __DIR__ . "/../models/usuario.php";

class LoginController {
    public function index() {
        require __DIR__ . "/../views/login.php";
    }

    public function autenticar() {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $usuario = Usuario::autenticar($email, $senha);

        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            header("Location: /dashboard.php");
            exit;
        } else {
            $erro = "E-mail ou senha inválidos";
            require __DIR__ . "/../views/login.php";
        }
    }

    public function sair() {
        session_destroy();
        header("Location: /");
        exit;
    }
}
