<?php
// Array de filmes (poderia vir de um banco futuramente)
$filmesDestaques = [
    ["img" => "/projetotadscinetime/public/assets/images/filme1.webp", "titulo" => "DEXTER", "desc" => "Um serial killer que caça criminosos em Miami."],
    ["img" => "/projetotadscinetime/public/assets/images/filme2.jpg", "titulo" => "CARROS", "desc" => "Relâmpago McQueen em uma jornada de amizade."],
    ["img" => "/projetotadscinetime/public/assets/images/filme3.png", "titulo" => "CORINGA", "desc" => "A origem do maior vilão de Gotham City."],
    ["img" => "/projetotadscinetime/public/assets/images/filme4.webp", "titulo" => "ARRANHA-CÉU", "desc" => "Ação intensa em um arranha-céu em chamas."],
    ["img" => "/projetotadscinetime/public/assets/images/filme5.jpg", "titulo" => "AVENGERS", "desc" => "Heróis se unem para salvar o mundo."],
    ["img" => "/projetotadscinetime/public/assets/images/filme6.webp", "titulo" => "HOMEM ARANHA LONGE DE CASA", "desc" => "Peter enfrenta novos desafios na Europa."],
];

// você pode criar $filmesPopulares, $filmesMelhorAvaliados da mesma forma
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineTime - Catálogo de Filmes</title>
  <link rel="stylesheet" href="/projetotadscinetime/public/assets/css/catalogo.css">
</head>
<body>

  <header>
    <div class="logo">
      <img src="/projetotadscinetime/public/assets/images/cinetimelogo2.png" alt="Logo CineTime">
    </div>
    <nav>
      <a href="index.php">Início</a>
      <a href="catalogo.php">Catálogo</a>
      <a href="perfil.php">Perfil</a>
      <a href="logout.php">Sair</a>
    </nav>
  </header>

  <section class="hero">
    <h2>Bem-vindo ao CineTime</h2>
    <p>Assista a filmes e séries de sucesso em um só lugar. Experimente a emoção do cinema onde você estiver.</p>
    <a href="#catalogo" class="btn-hero">Explorar Agora</a>
  </section>

  <main id="catalogo">
    <div class="catalogo-section">
      <h3>Destaques</h3>
      <button class="seta esquerda" onclick="scrollCarrossel(this, -1)">&#10094;</button>
      <div class="carrossel">
        <?php foreach ($filmesDestaques as $f): ?>
          <div class="filme-card">
            <img src="<?= $f['img'] ?>" alt="<?= $f['titulo'] ?>">
            <div class="filme-info">
              <h4><?= $f['titulo'] ?></h4>
              <p><?= $f['desc'] ?></p>
              <a href="#" class="btn-assistir">Assistir Agora</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <button class="seta direita" onclick="scrollCarrossel(this, 1)">&#10095;</button>
    </div>

    <!-- Você pode repetir a mesma lógica PHP para "Populares" e "Melhor avaliado" -->
  </main>

  <footer>
    <p>© <?= date("Y") ?> CineTime - Todos os direitos reservados</p>
  </footer>

  <script>
    function scrollCarrossel(btn, direction) {
      const section = btn.parentElement;
      const carrossel = section.querySelector('.carrossel');
      const scrollAmount = 300;
      carrossel.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }

    // Autoplay suave
    document.querySelectorAll('.carrossel').forEach(carrossel => {
      setInterval(() => {
        carrossel.scrollBy({ left: 200, behavior: 'smooth' });
        if (carrossel.scrollLeft + carrossel.clientWidth >= carrossel.scrollWidth) {
          carrossel.scrollTo({ left: 0, behavior: 'smooth' });
        }
      }, 5000);
    });
  </script>
</body>
</html>
