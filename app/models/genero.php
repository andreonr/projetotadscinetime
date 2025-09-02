<?php
require_once 'Conexao.php';

class Genero {
    public static function buscarTodos() {
        $sql = "SELECT * FROM generos ORDER BY nome ASC";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
}