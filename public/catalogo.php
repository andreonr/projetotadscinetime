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
        "titulo" => "DEXTER",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme1.jpg"
    ],
    [
        "id" => 2,
        "titulo" => "CARROS",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme2.jpg"
    ],
    [
        "id" => 3,
        "titulo" => "CORINGA",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme3.jpg"
    ],
    [
        "id" => 4,
        "titulo" => "ARRANHA-CEU",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme4.jpg"
    ],
    [
        "id" => 5,
        "titulo" => "AVENGERS",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme5.jpg"
    ],
    [
        "id" => 6,
        "titulo" => "HOMEM ARANHA LONGE DE CASA",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme6.jpg"
    ],
    [
        "id" => 7,
        "titulo" => "HOMEM ARANHA SEM VOLTA PARA CASA",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme7.jpg"
    ],
    [
        "id" => 8,
        "titulo" => "A MENINA E O DRAGAO",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme8.jpg"
    ],
    [
        "id" => 9,
        "titulo" => "VELOZES E FURIOSOS 10",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme9.jpg"
    ],
    [
        "id" => 10,
        "titulo" => "VINGADORES GUERRA INFINITA",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme10.jpg"
    ],
    [
        "id" => 11,
        "titulo" => "STRANGER THINGS",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme11.jpg"
    ],
    [
        "id" => 12,
        "titulo" => "CODIGO ALARUM",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme12.jpg"
    ],
    [
        "id" => 13,
        "titulo" => "SNEAKS DE PISANTE NOVO",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme13.jpg"
    ],
    [
        "id" => 14,
        "titulo" => "O LADRAO DE RAIOS",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme14.jpg"
    ],
    [
        "id" => 15,
        "titulo" => "THOR",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme15.jpg"
    ],
    [
        "id" => 16,
        "titulo" => "GUERRA CIVIL",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme16.jpg"
    ],
    [
        "id" => 17,
        "titulo" => "DIA DE MUERTOS",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme17.jpg"
    ],
    [
        "id" => 18,
        "titulo" => "THE LAST WARRIOR",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme18.jpg"
    ],
    [
        "id" => 19,
        "titulo" => "THE WORLD OF IT",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme19.jpg"
    ],
    [
        "id" => 20,
        "titulo" => "CAPITAO AMERICA",
        "descricao" => "",
        "url_capa" => "/projetotadscinetime/public/assets/images/filmes/filme20.jpg"
    ],
];
?>

<link rel="stylesheet" href="/projetotadscinetime/public/assets/css/catalogo.css">
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
