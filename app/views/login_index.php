<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>CineTime - Entrar</title>
  <!-- Importando o CSS externo -->
  <link rel="stylesheet" href="/public/assets/css/login.css">
</head>
<body>
  <div class="overlay"></div>
  
  <div class="login-box">
    <h2>🎬 CineTime</h2>

    <?php if (!empty($erro)): ?>
      <div class="error-box">
        <?= $erro ?>
      </div>
    <?php endif; ?>

    <form method="post" action="/public/index.php?controller=login&action=autenticar">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="seuemail@exemplo.com" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Sua senha" required>
      </div>
      <button type="submit">Entrar</button>
    </form>

    <p>Não tem conta? <a href="/public/index.php?controller=login&action=register">Cadastre-se</a></p>
  </div>
</body>
</html>
