<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /projetotadscinetime/public/index.php");
    exit;
}
require_once("../app/models/conexao.php");
require_once("../app/models/midia.php");

$midiaModel = new Midia($conn);
$filmes = $midiaModel->listarTodos();
include("../app/views/templates/header.php");
?>

<h1>Catálogo de Filmes</h1>
<div class="grid-filmes">
  <?php foreach ($filmes as $filme): ?>
    <div class="filme-card">
      <img src="<?= $filme['url_capa'] ?>" alt="<?= $filme['titulo'] ?>" width="150">
      <h3><?= $filme['titulo'] ?></h3>
      <p><?= substr($filme['descricao'], 0, 100) ?>...</p>
      <a href="filme.php?id=<?= $filme['id'] ?>">Assistir</a>
    </div>
  <?php endforeach; ?>
</div>

<?php include("../app/views/templates/footer.php"); ?>
