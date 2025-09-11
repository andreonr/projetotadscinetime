<?php
session_start();
if (!isset($_SESSION['usuarios'])) {
    header("Location: ../app/views/login.php");
    exit;
}
include("../app/views/templates/header.php");
?>

<h1>Meu Perfil</h1>
<p><strong>Nome:</strong> <?= $_SESSION['usuarios']['nome'] ?></p>
<p><strong>Email:</strong> <?= $_SESSION['usuarios']['email'] ?></p>

<a href="logout.php">Sair da conta</a>

<?php include("../app/views/templates/footer.php"); ?>
