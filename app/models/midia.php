<?php
// /app/Models/Midia.php
require_once 'Conexao.php';

class Midia {

    public static function buscarTodos() {
        // A consulta SQL usa LEFT JOIN para buscar o nome do gênero na tabela 'generos'
        $sql = "SELECT m.*, g.nome as nome_genero FROM midias m 
                LEFT JOIN generos g ON m.id_genero_fk = g.id_genero 
                ORDER BY m.titulo ASC";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id) {
        $sql = "SELECT * FROM midias WHERE id_midia = :id";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function salvar($dados) {
        // Se um ID foi passado, é uma atualização. Senão, é uma inserção.
        if (isset($dados['id_midia']) && !empty($dados['id_midia'])) {
            $sql = "UPDATE midias SET titulo = :titulo, sinopse = :sinopse, ano_lancamento = :ano, tipo = :tipo, nota = :nota, status = :status, id_genero_fk = :id_genero WHERE id_midia = :id_midia";
        } else {
            $sql = "INSERT INTO midias (titulo, sinopse, ano_lancamento, tipo, nota, status, id_genero_fk) VALUES (:titulo, :sinopse, :ano, :tipo, :nota, :status, :id_genero)";
        }

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':titulo', $dados['titulo']);
        $stmt->bindValue(':sinopse', $dados['sinopse']);
        $stmt->bindValue(':ano', $dados['ano_lancamento']);
        $stmt->bindValue(':tipo', $dados['tipo']);
        $stmt->bindValue(':nota', $dados['nota']);
        $stmt->bindValue(':status', $dados['status']);
        $stmt->bindValue(':id_genero', $dados['id_genero_fk']);
        
        if (isset($dados['id_midia']) && !empty($dados['id_midia'])) {
            $stmt->bindValue(':id_midia', $dados['id_midia']);
        }

        return $stmt->execute();
    }

    public static function deletar($id) {
        $sql = "DELETE FROM midias WHERE id_midia = :id";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}