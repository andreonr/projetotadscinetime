<?php

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;
    public $email;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar usuário
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET username=:username, password=:password, email=:email";

        $stmt = $this->conn->prepare($query);

        // limpar dados
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->email = htmlspecialchars(strip_tags($this->email));

        // Hash da senha
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

        // Bind dos valores
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $password_hash);
        $stmt->bindParam(":email", $this->email);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Buscar usuário por username
    public function findByUsername($username) {
        $query = "SELECT id, username, password, email, created_at 
                  FROM " . $this->table_name . " 
                  WHERE username = :username 
                  LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->email = $row['email'];
            $this->created_at = $row['created_at'];
            return true;
        }

        return false;
    }

    // Verificar senha
    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }

    // Listar todos os usuários
    public function read() {
        $query = "SELECT id, username, email, created_at 
                  FROM " . $this->table_name . " 
                  ORDER BY created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Buscar usuário por ID
    public function readOne() {
        $query = "SELECT id, username, email, created_at 
                  FROM " . $this->table_name . " 
                  WHERE id = :id 
                  LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->created_at = $row['created_at'];
            return true;
        }

        return false;
    }

    // Atualizar usuário
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET username=:username, email=:email 
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        // limpar dados
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind dos valores
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Deletar usuário
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

