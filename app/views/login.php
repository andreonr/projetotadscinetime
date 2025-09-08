<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>CineTime - Entrar</title>
  <link rel="stylesheet" href="../public/assets/css/login.css">
</head>

<body>
  <div class= "overlay"></div>

  <div class="login-box" role="main" aria-labelledby="login-title">
    <h2 id="login-title">CineTime</h2>

    <?php if (!empty($erro)): ?>
      <div class="error-box" role="alert"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <form method="post" action="/public/index.php?controller=login&action=autenticar" novalidate>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" placeholder="seuemail@exemplo.com" required>
      </div>

      <div class="form-group">
        <label for="senha">Senha</label>
        <input id="senha" type="password" name="senha" placeholder="Sua senha" required>
      </div>

      <button type="submit" class="btn-login">Entrar</button>
    </form>

    <p class="small">Não tem conta? <a href="/public/index.php?controller=login&action=register">Cadastre-se</a></p>
  </div>

</body>
</html>