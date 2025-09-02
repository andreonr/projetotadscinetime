<?php
// /app/Models/Conexao.php
class Conexao {
    private static $instance;

    public static function getConn() {
        if (!isset(self::$instance)) {
            // credenciais do banco de dados
            $host = 'localhost';
            $dbname = 'cinetime_db';
            $user = 'root';
            $pass = '';

            try {
                self::$instance = new \PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}