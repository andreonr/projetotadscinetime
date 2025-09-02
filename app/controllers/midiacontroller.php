<?php
// /app/Controllers/MidiaController.php o centro da aplicação
require_once __DIR__ . '/../Models/Midia.php';
require_once __DIR__ . '/../Models/Genero.php';

class MidiaController {
    
    // listar todas as mídias
    public function listar() {
        $midias = Midia::buscarTodos();
        // Inclui a View para exibir a lista
        require_once __DIR__ . '/../Views/midia_listar.php';
    }

    // exibe o formulário (tanto para criar quanto para editar)
    public function formulario() {
        $midia = ['id_midia' => '', 'titulo' => '', 'sinopse' => '', 'ano_lancamento' => '', 'tipo' => 'Filme', 'nota' => '', 'status' => 'Quero Assistir', 'id_genero_fk' => ''];
        
        // Se um ID foi passado pela URL, busca os dados da mídia para edição
        if (isset($_GET['id'])) {
            $midia = Midia::buscarPorId($_GET['id']);
        }

        // Busca todos os gêneros para preencher o <select> no formulário
        $generos = Genero::buscarTodos();
        require_once __DIR__ . '/../Views/midia_formulario.php';
    }

    // processar os dados do formulário (salvar ou atualizar)
    public function salvar() {
        if (Midia::salvar($_POST)) {
            header('Location: ./index.php?acao=listar'); // Redireciona para a lista
            exit;
        } else {
            echo "Erro ao salvar a mídia.";
        }
    }

    // deletar uma mídia
    public function deletar() {
        if (isset($_GET['id'])) {
            if (Midia::deletar($_GET['id'])) {
                header('Location: ./index.php?acao=listar');
                exit;
            }
        } else {
            echo "ID não fornecido para exclusão.";
        }
    }
}