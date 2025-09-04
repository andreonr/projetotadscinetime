<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../app/views/login.php");
    exit;
}
require_once("../app/models/conexao.php");
require_once("../app/models/midia.php");

if (!isset($_GET['id'])) {
    die("Filme não encontrado!");
}

$midiaModel = new Midia($conn);
$filme = $midiaModel->buscarPorId($_GET['id']);
include("../app/views/templates/header.php");
?>

<h1><?= $filme['titulo'] ?></h1>
<img src="<?= $filme['url_capa'] ?>" alt="<?= $filme['titulo'] ?>" width="250">
<p><strong>Gênero:</strong> <?= $filme['genero'] ?></p>
<p><strong>Ano:</strong> <?= $filme['ano'] ?></p>
<p><?= $filme['descricao'] ?></p>

<video width="640" controls>
  <source src="<?= $filme['url_video'] ?>" type="video/mp4">
  Seu navegador não suporta vídeo.
</video>

<?php include("../app/views/templates/footer.php"); ?>