<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /projetotadscinetime/public/index.php");
    exit;
}

include("../app/views/templates/header.php");


$filmes = [
    [
        "id" => 1,
        "titulo" => "Filme 1",
        "descricao" => "Descrição curta do Filme 1",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme1.jpg"
    ],
    [
        "id" => 2,
        "titulo" => "Filme 2",
        "descricao" => "Descrição curta do Filme 2",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme2.jpg"
    ],
    [
        "id" => 3,
        "titulo" => "Filme 3",
        "descricao" => "Descrição curta do Filme 3",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
    [
        "id" => 4,
        "titulo" => "Filme 4",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
    [
        "id" => 5,
        "titulo" => "Filme 5",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 6,
        "titulo" => "Filme 6",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 7,
        "titulo" => "Filme 7",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 8,
        "titulo" => "Filme 8",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 9,
        "titulo" => "Filme 9",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 10,
        "titulo" => "Filme 10",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 11,
        "titulo" => "Filme 11",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 12,
        "titulo" => "Filme 12",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 13,
        "titulo" => "Filme 13",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 14,
        "titulo" => "Filme 14",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 15,
        "titulo" => "Filme 15",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 16,
        "titulo" => "Filme 17",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 18,
        "titulo" => "Filme 18",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 19,
        "titulo" => "Filme 19",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
[
        "id" => 20,
        "titulo" => "Filme 20",
        "descricao" => "Descrição curta do Filme ",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
];
?>

<h1>Catálogo de Filmes</h1>
<div class="grid-filmes">
  <?php foreach ($filmes as $filme): ?>
    <div class="filme-card">
      <img src="<?= $filme['url_capa'] ?>" alt="<?= $filme['titulo'] ?>" class="filme-capa">
      <h3><?= $filme['titulo'] ?></h3>
      <p><?= substr($filme['descricao'], 0, 100) ?>...</p>
      <a href="filme.php?id=<?= $filme['id'] ?>" class="btn-assistir">Assistir</a>
    </div>
  <?php endforeach; ?>
</div>

<?php include("../app/views/templates/footer.php"); ?>
