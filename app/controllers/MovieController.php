<?php

class MovieController {
    private $db;
    private $movie;
    private $genre;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->movie = new Movie($this->db);
        $this->genre = new Genre($this->db);
    }

    // Exibir catálogo de filmes (página principal)
    public function index() {
        // Verificar se usuário está logado
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        // Buscar filmes
        $search = $_GET['search'] ?? '';
        $genre_filter = $_GET['genre'] ?? '';

        if (!empty($search)) {
            $stmt = $this->movie->search($search);
        } elseif (!empty($genre_filter)) {
            $stmt = $this->movie->readByGenre($genre_filter);
        } else {
            $stmt = $this->movie->read();
        }

        $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Buscar gêneros para o filtro
        $genres_stmt = $this->genre->read();
        $genres = $genres_stmt->fetchAll(PDO::FETCH_ASSOC);

        include '../app/views/movies/index.php';
    }

    // Exibir detalhes de um filme
    public function show($id) {
        // Verificar se usuário está logado
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $this->movie->id = $id;
        
        if ($this->movie->readOne()) {
            include '../app/views/movies/show.php';
        } else {
            http_response_code(404);
            echo "Filme não encontrado";
        }
    }

    // Exibir formulário para criar filme (admin)
    public function create() {
        // Buscar gêneros para o select
        $genres_stmt = $this->genre->read();
        $genres = $genres_stmt->fetchAll(PDO::FETCH_ASSOC);

        include '../app/views/movies/create.php';
    }

    // Processar criação de filme
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->movie->title = $_POST['title'] ?? '';
            $this->movie->synopsis = $_POST['synopsis'] ?? '';
            $this->movie->release_year = $_POST['release_year'] ?? '';
            $this->movie->poster_url = $_POST['poster_url'] ?? '';
            $this->movie->genre_id = $_POST['genre_id'] ?? '';

            if ($this->movie->create()) {
                header('Location: /');
                exit();
            } else {
                $error = "Erro ao criar filme.";
                $this->create();
            }
        }
    }

    // Exibir formulário para editar filme
    public function edit($id) {
        $this->movie->id = $id;
        
        if ($this->movie->readOne()) {
            // Buscar gêneros para o select
            $genres_stmt = $this->genre->read();
            $genres = $genres_stmt->fetchAll(PDO::FETCH_ASSOC);

            include '../app/views/movies/edit.php';
        } else {
            http_response_code(404);
            echo "Filme não encontrado";
        }
    }

    // Processar atualização de filme
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->movie->id = $id;
            $this->movie->title = $_POST['title'] ?? '';
            $this->movie->synopsis = $_POST['synopsis'] ?? '';
            $this->movie->release_year = $_POST['release_year'] ?? '';
            $this->movie->poster_url = $_POST['poster_url'] ?? '';
            $this->movie->genre_id = $_POST['genre_id'] ?? '';

            if ($this->movie->update()) {
                header('Location: /movie?id=' . $id);
                exit();
            } else {
                $error = "Erro ao atualizar filme.";
                $this->edit($id);
            }
        }
    }

    // Deletar filme
    public function destroy($id) {
        $this->movie->id = $id;
        
        if ($this->movie->delete()) {
            header('Location: /');
            exit();
        } else {
            echo "Erro ao deletar filme.";
        }
    }
}

?>

