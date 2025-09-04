<?php
require_once "conexao.php";

class Usuario {
    public static function autenticar($email, $senha) {
        $con = Conexao::getConexao();
        $sql = $con->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            if (password_verify($senha, $user['senha'])) {
                return $user;
            }
        }
        return false;
    }

    public static function cadastrar($nome, $email, $senha) {
        $con = Conexao::getConexao();
        $sql = $con->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", password_hash($senha, PASSWORD_DEFAULT));
        return $sql->execute();
    }
}
