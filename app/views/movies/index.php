<?php $title = ''; ?>
<?php include '../app/views/layouts/header.php'; ?>

<div class="catalog-container">
    <div class="catalog-header">
        <h1>Catálogo de Filmes</h1>
        <p>Descubra os melhores filmes em nosso catálogo</p>
    </div>
    
    <div class="filters-section">
        <form method="GET" class="filters-form">
            <div class="search-group">
                <div class="search-input">
                    <i class="fas fa-search"></i>
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Buscar filmes..." 
                        value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>"
                    >
                </div>
                
                <select name="genre" class="genre-select">
                    <option value="">Todos os gêneros</option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?php echo $genre['id']; ?>" 
                                <?php echo ($_GET['genre'] ?? '') == $genre['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($genre['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <button type="submit" class="btn btn-filter">
                    <i class="fas fa-filter"></i>
                    Filtrar
                </button>
            </div>
        </form>
    </div>
    
    <?php if (empty($movies)): ?>
        <div class="no-movies">
            <i class="fas fa-film"></i>
            <h3>Nenhum filme encontrado</h3>
            <p>Tente ajustar os filtros ou buscar por outro termo.</p>
        </div>
    <?php else: ?>
        <div class="movies-grid">
            <?php foreach ($movies as $movie): ?>
                <div class="movie-card" onclick="showMovieDetails(<?php echo $movie['id']; ?>)">
                    <div class="movie-poster">
                        <?php if (!empty($movie['poster_url'])): ?>
                            <img src="<?php echo htmlspecialchars($movie['poster_url']); ?>" 
                                 alt="<?php echo htmlspecialchars($movie['title']); ?>"
                                 onerror="this.src='/images/no-poster.jpg'">
                        <?php else: ?>
                            <div class="no-poster">
                                <i class="fas fa-film"></i>
                                <span>Sem Poster</span>
                            </div>
                        <?php endif; ?>
                        
                        <div class="movie-overlay">
                            <div class="movie-info">
                                <h3><?php echo htmlspecialchars($movie['title']); ?></h3>
                                <p class="movie-year"><?php echo htmlspecialchars($movie['release_year']); ?></p>
                                <p class="movie-genre"><?php echo htmlspecialchars($movie['genre_name'] ?? 'Sem gênero'); ?></p>
                            </div>
                            
                            <div class="movie-actions">
                                <button class="btn btn-play" onclick="event.stopPropagation(); showMovieDetails(<?php echo $movie['id']; ?>)">
                                    <i class="fas fa-info-circle"></i>
                                    Detalhes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Modal para detalhes do filme -->
<div id="movieModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="movieDetails">
            <!-- o coonteúdo é carregado pelo javascript -->
        </div>
    </div>
</div>

<script>
function showMovieDetails(movieId) {
    // Redirecionar para a página de detalhes
    window.location.href = '/movie?id=' + movieId;
}

function closeModal() {
    document.getElementById('movieModal').style.display = 'none';
}

// Fechar modal ao clicar fora dele
window.onclick = function(event) {
    const modal = document.getElementById('movieModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

<?php include '../app/views/layouts/footer.php'; ?>

