<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<h1>PHP está funcionando!</h1>';
echo '<p>Versão do PHP: ' . phpversion() . '</p>';

// $variavel_nao_definida = $nao_existe;

//conectar ao banco de dados para ver se há erros
try {
    $pdo = new PDO('mysql:host=localhost;dbname=cinetime_db', 'cinetime', 'cinetime123');
    echo '<p>Conexão com o banco de dados bem-sucedida!</p>';
} catch (PDOException $e) {
    echo '<p>Erro de conexão com o banco de dados: ' . $e->getMessage() . '</p>';
}

?>
