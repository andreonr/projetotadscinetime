<?php
require_once "conexao.php";

class usuarios {
    private $con;

    public function __construct() {
        $this->con = Conexao::getConn();
    }

    public function criar($nome, $email, $senha) {
        $sql = $this->con->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":senha", $senha);
        return $sql->execute();
    }

    public function buscarPorEmail($email) {
        $sql = $this->con->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindParam(":email", $email);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function autenticar($email, $senha) {
        $usuarios = $this->buscarPorEmail($email);

        if ($usuarios && password_verify($senha, $usuarios['senha'])) {
            return $usuarios; // retorna dados do usuário
        }

        return false; // login inválido
    }
}