<?php

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Exibir página de login
    public function showLogin() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /');
            exit();
        }
        
        include '../app/views/auth/login.php';
    }

    // processar login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $error = "Por favor, preencha todos os campos.";
                include '../app/views/auth/login.php';
                return;
            }

            if ($this->user->findByUsername($username)) {
                if ($this->user->verifyPassword($password)) {
                    $_SESSION['user_id'] = $this->user->id;
                    $_SESSION['username'] = $this->user->username;
                    header('Location: /');
                    exit();
                } else {
                    $error = "Credenciais inválidas.";
                }
            } else {
                $error = "Credenciais inválidas.";
            }

            include '../app/views/auth/login.php';
        }
    }

    // processar logout
    public function logout() {
        session_destroy();
        header('Location: /login');
        exit();
    }

    // página de registro(exibir)
    public function showRegister() {
        if (isset($_SESSION["user_id"])) {
            header("Location: /");
            exit();
        }
        include '../app/views/auth/register.php';
    }

    // Processar registro de novo usuário
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            // Validações básicas
            if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
                $error = "Por favor, preencha todos os campos.";
                include '../app/views/auth/register.php';
                return;
            }

            if ($password !== $confirm_password) {
                $error = "As senhas não coincidem.";
                include '../app/views/auth/register.php';
                return;
            }

            if (strlen($password) < 6) {
                $error = "A senha deve ter pelo menos 6 caracteres.";
                include '../app/views/auth/register.php';
                return;
            }

            // Verificar se o usuário já existe
            if ($this->user->findByUsername($username)) {
                $error = "Nome de usuário já existe.";
                include '../app/views/auth/register.php';
                return;
            }

            // Criar novo usuário
            $this->user->username = $username;
            $this->user->email = $email;
            $this->user->password = $password;

            if ($this->user->create()) {
                $success = "Usuário criado com sucesso! Faça login para continuar.";
                include '../app/views/auth/login.php';
            } else {
                $error = "Erro ao criar usuário. Tente novamente.";
                include '../app/views/auth/register.php';
            }
        } else {
            include '../app/views/auth/register.php';
        }
    }
}

?>

