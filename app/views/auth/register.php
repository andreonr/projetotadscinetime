<?php $title = 'Cadastro - CineTime'; ?>
<?php include '../app/views/layouts/header.php'; ?>

<div class="login-container">
    <div class="login-box">
        <div class="login-header">
            <div class="logo">
                <i class="fas fa-film"></i>
                <h1>CineTime</h1>
            </div>
            <p>Crie sua conta para acessar o catálogo de filmes</p>
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
        
        <form method="POST" action="/register" class="login-form">
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
                    placeholder="Escolha um nome de usuário"
                    value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                >
            </div>
            
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i>
                    Email
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    placeholder="Digite seu email"
                    value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
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
                    placeholder="Crie uma senha"
                >
            </div>
            
            <div class="form-group">
                <label for="confirm_password">
                    <i class="fas fa-lock"></i>
                    Confirmar Senha
                </label>
                <input 
                    type="password" 
                    id="confirm_password" 
                    name="confirm_password" 
                    required 
                    placeholder="Confirme sua senha"
                >
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-user-plus"></i>
                Cadastrar
            </button>
        </form>
        
        <div class="login-footer">
            <p>Já tem uma conta? <a href="/login">Faça login aqui</a></p>
        </div>
    </div>
</div>

<?php include '../app/views/layouts/footer.php'; ?>

