<?php $title = ''; ?>
<?php include '../app/views/layouts/header.php'; ?>

<div class="login-container">
    <div class="login-box">
        <div class="login-header">
            <div class="logo">
                <i class="fas fa-film"></i>
                <h1>CineTime</h1>
            </div>
            <p>Entre para acessar o catálogo de filmes</p>
        </div>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo htmlspecialchars($success); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="/login" class="login-form">
            <div class="form-group">
                <label for="username">
                    <i class="fas fa-user"></i>
                    Nome de usuário
                </label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    required 
                    placeholder="Digite seu nome de usuário"
                    value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                >
            </div>
            
            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i>
                    Senha
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    placeholder="Digite sua senha"
                >
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i>
                Entrar
            </button>
        </form>
        
        <div class="login-footer">
            <p>Não tem uma conta? <a href="/register">Cadastre-se aqui</a></p>
            <p>Sistema desenvolvido para fins acadêmicos</p>
        </div>
    </div>
</div>

<?php include '../app/views/layouts/footer.php'; ?>

