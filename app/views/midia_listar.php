<?php require_once 'templates/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Meu Catálogo</h1>
    <a href="index.php?acao=formulario" class="btn btn-primary">Adicionar Nova Mídia</a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Título</th>
            <th>Tipo</th>
            <th>Gênero</th>
            <th>Status</th>
            <th>Nota</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($midias) > 0): ?>
            <?php foreach ($midias as $midia): ?>
            <tr>
                <td><?= htmlspecialchars($midia['titulo']) ?></td>
                <td><?= htmlspecialchars($midia['tipo']) ?></td>
                <td><?= htmlspecialchars($midia['nome_genero'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($midia['status']) ?></td>
                <td><?= htmlspecialchars($midia['nota']) ?></td>
                <td>
                    <a href="index.php?acao=formulario&id=<?= $midia['id_midia'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="index.php?acao=deletar&id=<?= $midia['id_midia'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Nenhuma mídia cadastrada ainda.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once 'templates/footer.php'; ?>