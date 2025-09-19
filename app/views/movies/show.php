<?php $title = htmlspecialchars($this->movie->title) . ' - CineTime'; ?>
<?php include '../app/views/layouts/header.php'; ?>

<div class="movie-details-container">
    <div class="movie-hero">
        <div class="movie-backdrop">
            <?php if (!empty($this->movie->poster_url)): ?>
                <img src="<?php echo htmlspecialchars($this->movie->poster_url); ?>" 
                     alt="<?php echo htmlspecialchars($this->movie->title); ?>"
                     class="backdrop-image">
            <?php endif; ?>
            <div class="backdrop-overlay"></div>
        </div>
        
        <div class="movie-hero-content">
            <div class="movie-poster-large">
                <?php if (!empty($this->movie->poster_url)): ?>
                    <img src="<?php echo htmlspecialchars($this->movie->poster_url); ?>" 
                         alt="<?php echo htmlspecialchars($this->movie->title); ?>"
                         onerror="this.src='/images/no-poster.jpg'">
                <?php else: ?>
                    <div class="no-poster-large">
                        <i class="fas fa-film"></i>
                        <span>Sem Poster</span>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="movie-info-large">
                <h1><?php echo htmlspecialchars($this->movie->title); ?></h1>
                
                <div class="movie-meta">
                    <span class="movie-year">
                        <i class="fas fa-calendar"></i>
                        <?php echo htmlspecialchars($this->movie->release_year); ?>
                    </span>
                    
                    <span class="movie-genre">
                        <i class="fas fa-tag"></i>
                        <?php echo htmlspecialchars($this->movie->genre_name ?? 'Sem gênero'); ?>
                    </span>
                </div>
                
                <div class="movie-synopsis">
                    <h3>Sinopse</h3>
                    <p><?php echo nl2br(htmlspecialchars($this->movie->synopsis ?? 'Sinopse não disponível.')); ?></p>
                </div>
                
                <div class="movie-actions-large">
                    <button class="btn btn-back" onclick="history.back()">
                        <i class="fas fa-arrow-left"></i>
                        Voltar ao Catálogo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../app/views/layouts/footer.php'; ?>

