<?php

class Movie {
    private $conn;
    private $table_name = "movies";

    public $id;
    public $title;
    public $synopsis;
    public $release_year;
    public $poster_url;
    public $genre_id;
    public $genre_name;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar filme
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET title=:title, synopsis=:synopsis, release_year=:release_year, 
                      poster_url=:poster_url, genre_id=:genre_id";

        $stmt = $this->conn->prepare($query);

        // limpar dados
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->synopsis = htmlspecialchars(strip_tags($this->synopsis));
        $this->release_year = htmlspecialchars(strip_tags($this->release_year));
        $this->poster_url = htmlspecialchars(strip_tags($this->poster_url));
        $this->genre_id = htmlspecialchars(strip_tags($this->genre_id));

        // Bind dos valores
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":synopsis", $this->synopsis);
        $stmt->bindParam(":release_year", $this->release_year);
        $stmt->bindParam(":poster_url", $this->poster_url);
        $stmt->bindParam(":genre_id", $this->genre_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Listar todos os filmes com informações do gênero
    public function read() {
        $query = "SELECT m.id, m.title, m.synopsis, m.release_year, m.poster_url, 
                         m.genre_id, g.name as genre_name, m.created_at
                  FROM " . $this->table_name . " m
                  LEFT JOIN genres g ON m.genre_id = g.id
                  ORDER BY m.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Buscar filme por ID
    public function readOne() {
        $query = "SELECT m.id, m.title, m.synopsis, m.release_year, m.poster_url, 
                         m.genre_id, g.name as genre_name, m.created_at
                  FROM " . $this->table_name . " m
                  LEFT JOIN genres g ON m.genre_id = g.id
                  WHERE m.id = :id 
                  LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->title = $row['title'];
            $this->synopsis = $row['synopsis'];
            $this->release_year = $row['release_year'];
            $this->poster_url = $row['poster_url'];
            $this->genre_id = $row['genre_id'];
            $this->genre_name = $row['genre_name'];
            $this->created_at = $row['created_at'];
            return true;
        }

        return false;
    }

    // Buscar filmes por gênero
    public function readByGenre($genre_id) {
        $query = "SELECT m.id, m.title, m.synopsis, m.release_year, m.poster_url, 
                         m.genre_id, g.name as genre_name, m.created_at
                  FROM " . $this->table_name . " m
                  LEFT JOIN genres g ON m.genre_id = g.id
                  WHERE m.genre_id = :genre_id
                  ORDER BY m.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':genre_id', $genre_id);
        $stmt->execute();

        return $stmt;
    }

    // Buscar filmes por título
    public function search($search_term) {
        $query = "SELECT m.id, m.title, m.synopsis, m.release_year, m.poster_url, 
                         m.genre_id, g.name as genre_name, m.created_at
                  FROM " . $this->table_name . " m
                  LEFT JOIN genres g ON m.genre_id = g.id
                  WHERE m.title LIKE :search_term
                  ORDER BY m.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $search_term = "%{$search_term}%";
        $stmt->bindParam(':search_term', $search_term);
        $stmt->execute();

        return $stmt;
    }

    // Atualizar filme
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET title=:title, synopsis=:synopsis, release_year=:release_year, 
                      poster_url=:poster_url, genre_id=:genre_id 
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        // 
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->synopsis = htmlspecialchars(strip_tags($this->synopsis));
        $this->release_year = htmlspecialchars(strip_tags($this->release_year));
        $this->poster_url = htmlspecialchars(strip_tags($this->poster_url));
        $this->genre_id = htmlspecialchars(strip_tags($this->genre_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind dos valores
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':synopsis', $this->synopsis);
        $stmt->bindParam(':release_year', $this->release_year);
        $stmt->bindParam(':poster_url', $this->poster_url);
        $stmt->bindParam(':genre_id', $this->genre_id);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Deletar filme
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

?>

