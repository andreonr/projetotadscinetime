<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'CineTime'; ?></title>
    <link rel="stylesheet" href="/css/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php if (isset($_SESSION['user_id'])): ?>  
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-brand">
                <i class="fas fa-film"></i>
                <span>CineTime</span>
            </div>
            
            <div class="nav-menu">
                <a href="/" class="nav-link">
                    <i class="fas fa-home"></i>
                    Início
                </a>
                <a href="/logout" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    Sair
                </a>
            </div>
            
            <div class="nav-user">
                <i class="fas fa-user-circle"></i>
                <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            </div>
        </div>
    </nav>
    <?php endif; ?>
    
    <main class="main-content"><?php echo $title ?? 'CineTime'; ?>

