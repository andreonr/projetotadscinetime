<?php include __DIR__ . "/templates/header.php"; ?>

<div class="card">
    <h2>Entrar</h2>
    <?php if (!empty($erro)): ?>
        <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>

    <form method="post" action="/?controller=login&action=autenticar">
        <div class="mb-3">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>

<?php include __DIR__ . "/templates/footer.php"; ?>
