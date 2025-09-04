<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../app/views/login.php");
    exit;
}
include("../app/views/templates/header.php");
?>

<h1>Meu Perfil</h1>
<p><strong>Nome:</strong> <?= $_SESSION['usuario']['nome'] ?></p>
<p><strong>Email:</strong> <?= $_SESSION['usuario']['email'] ?></p>

<a href="logout.php">Sair da conta</a>

<?php include("../app/views/templates/footer.php"); ?>