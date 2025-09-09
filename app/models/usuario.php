<?php
require_once "conexao.php";

class Usuario {
    private $con;

    public function __construct() {
        $this->con = Conexao::getConexao();
    }

    public function criar($nome, $email, $senha) {
        $sql = $this->con->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)");
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":senha", $senha);
        return $sql->execute();
    }

    public function buscarPorEmail($email) {
        $sql = $this->con->prepare("SELECT * FROM usuario WHERE email = :email");
        $sql->bindParam(":email", $email);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}