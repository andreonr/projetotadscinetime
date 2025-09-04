<?php require_once 'templates/header.php'; ?>

<h1><?= empty($midia['id_midia']) ? 'Cadastrar Nova Mídia' : 'Editar Mídia' ?></h1>

<form action="index.php?acao=salvar" method="POST" class="mt-4">
    <input type="hidden" name="id_midia" value="<?= $midia['id_midia'] ?>">

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($midia['titulo']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="sinopse" class="form-label">Sinopse</label>
        <textarea class="form-control" id="sinopse" name="sinopse" rows="3"><?= htmlspecialchars($midia['sinopse']) ?></textarea>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="ano_lancamento" class="form-label">Ano de Lançamento</label>
            <input type="number" class="form-control" id="ano_lancamento" name="ano_lancamento" value="<?= htmlspecialchars($midia['ano_lancamento']) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-select" id="tipo" name="tipo" required>
                <option value="Filme" <?= ($midia['tipo'] == 'Filme') ? 'selected' : '' ?>>Filme</option>
                <option value="Série" <?= ($midia['tipo'] == 'Série') ? 'selected' : '' ?>>Série</option>
            </select>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="id_genero_fk" class="form-label">Gênero</label>
            <select class="form-select" id="id_genero_fk" name="id_genero_fk" required>
                <option value="">Selecione um gênero</option>
                <?php foreach ($generos as $genero): ?>
                    <option value="<?= $genero['id_genero'] ?>" <?= ($midia['id_genero_fk'] == $genero['id_genero']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($genero['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Quero Assistir" <?= ($midia['status'] == 'Quero Assistir') ? 'selected' : '' ?>>Quero Assistir</option>
                <option value="Assistindo" <?= ($midia['status'] == 'Assistindo') ? 'selected' : '' ?>>Assistindo</option>
                <option value="Assistido" <?= ($midia['status'] == 'Assistido') ? 'selected' : '' ?>>Assistido</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="nota" class="form-label">Nota (0 a 10)</label>
            <input type="number" step="0.1" min="0" max="10" class="form-control" id="nota" name="nota" value="<?= htmlspecialchars($midia['nota']) ?>">
        </div>
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="index.php?acao=listar" class="btn btn-secondary">Cancelar</a>
</form>

<?php require_once 'templates/footer.php'; ?>