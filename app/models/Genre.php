<?php

class Genre {
    private $conn;
    private $table_name = "genres";

    public $id;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar gênero
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET name=:name";

        $stmt = $this->conn->prepare($query);

        // limpa os dados
        $this->name = htmlspecialchars(strip_tags($this->name));

        // valores
        $stmt->bindParam(":name", $this->name);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Listar todos os gêneros
    public function read() {
        $query = "SELECT id, name FROM " . $this->table_name . " ORDER BY name ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Buscar gênero por ID
    public function readOne() {
        $query = "SELECT id, name FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->name = $row['name'];
            return true;
        }

        return false;
    }

    // Atualizar gênero
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET name=:name 
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        // limpar dados
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind dos valores
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Deletar gênero
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

