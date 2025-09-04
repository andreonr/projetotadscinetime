<?php include __DIR__ . "/templates/header.php"; ?>

<div class="container" style="max-width:400px; margin:auto; padding:40px; background:#111; color:#fff; border-radius:12px;">
    <h2 style="text-align:center; margin-bottom:20px;">🎬 CineTime - Entrar</h2>

    <?php if (!empty($erro)): ?>
        <div style="background:#ff4d4d; padding:10px; border-radius:6px; margin-bottom:15px; text-align:center;">
            <?= $erro ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/public/index.php?controller=login&action=autenticar">
        <div class="mb-3">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" required style="width:100%; padding:10px; border-radius:8px;">
        </div>
        <div class="mb-3">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" required style="width:100%; padding:10px; border-radius:8px;">
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%; padding:10px; background:#4f8cff; border:none; border-radius:8px; font-weight:bold;">
            Entrar
        </button>
    </form>

    <p style="margin-top:15px; text-align:center;">Não tem conta?
        <a href="#" style="color:#4f8cff;">Cadastre-se</a>
    </p>
</div>

<?php include __DIR__ . "/templates/footer.php"; ?>
