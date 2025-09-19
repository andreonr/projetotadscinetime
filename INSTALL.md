# Guia de Instalação - CineTime

## Requisitos do Sistema

### Software Necessário:
- **PHP**: Versão 8.1 ou superior
- **MySQL**: Versão 8.0 ou superior
- **Servidor Web**: Apache 2.4+ (com mod_rewrite habilitado)
- **Sistema Operacional**: Linux (Ubuntu/Debian recomendado), Windows ou macOS

### Extensões PHP Necessárias:
- PDO
- PDO_MySQL
- mbstring
- openssl

## Instalação Passo a Passo

### 1. Preparação do Ambiente

#### Ubuntu/Debian:
```bash
# Atualizar sistema
sudo apt update && sudo apt upgrade -y

# Instalar Apache, PHP e MySQL
sudo apt install apache2 php php-mysql mysql-server -y

# Habilitar mod_rewrite
sudo a2enmod rewrite

# Reiniciar Apache
sudo systemctl restart apache2
```

#### Windows (XAMPP):
1. Baixe e instale o XAMPP
2. Inicie Apache e MySQL pelo painel de controle
3. Certifique-se de que PHP 8.1+ está instalado

### 2. Configuração do Banco de Dados

```sql
-- Conectar ao MySQL como root
mysql -u root -p

-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS cinetime_db;

-- Criar usuário específico
CREATE USER IF NOT EXISTS 'cinetime'@'localhost' IDENTIFIED BY 'cinetime123';

-- Conceder privilégios
GRANT ALL PRIVILEGES ON cinetime_db.* TO 'cinetime'@'localhost';
FLUSH PRIVILEGES;

-- Sair do MySQL
EXIT;
```

### 3. Instalação do Projeto

```bash
# Navegar para o diretório web
cd /var/www/html

# Clonar ou copiar o projeto
# Se usando Git:
git clone [URL_DO_REPOSITORIO] cinetime

# Ou copiar arquivos manualmente para:
# /var/www/html/cinetime/
```

### 4. Configuração de Permissões

```bash
# Definir permissões corretas
sudo chown -R www-data:www-data /var/www/html/cinetime
sudo chmod -R 755 /var/www/html/cinetime
```

### 5. Configuração do Apache

Criar arquivo de configuração do virtual host:

```bash
sudo nano /etc/apache2/sites-available/cinetime.conf
```

Conteúdo do arquivo:
```apache
<VirtualHost *:80>
    DocumentRoot /var/www/html/cinetime/public
    ServerName cinetime.local
    
    <Directory /var/www/html/cinetime/public>
        AllowOverride All
        Require all granted
        Options Indexes FollowSymLinks
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/cinetime_error.log
    CustomLog ${APACHE_LOG_DIR}/cinetime_access.log combined
</VirtualHost>
```

Habilitar o site:
```bash
sudo a2ensite cinetime.conf
sudo a2dissite 000-default.conf
sudo systemctl reload apache2
```

### 6. Configuração do Banco de Dados

```bash
# Executar script de criação das tabelas
mysql -u cinetime -pcinetime123 cinetime_db < /var/www/html/cinetime/database/database_schema.sql

# Inserir dados de exemplo
mysql -u cinetime -pcinetime123 cinetime_db < /var/www/html/cinetime/database/sample_data.sql
```

### 7. Configuração da Aplicação

Verificar arquivo `config/database.php`:
```php
<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'cinetime_db';
    private $username = 'cinetime';
    private $password = 'cinetime123';
    // ...
}
?>
```

### 8. Teste da Instalação

#### Usando Apache:
1. Acesse: `http://localhost/cinetime/public/`
2. Ou: `http://cinetime.local/` (se configurou virtual host)

#### Usando Servidor PHP Integrado (para desenvolvimento):
```bash
cd /var/www/html/cinetime/public
php -S localhost:8080
```
Acesse: `http://localhost:8080`

### 9. Login e Registro no Sistema

**Credenciais padrão para login:**
- **Usuário**: admin
- **Senha**: password

Ou:
- **Usuário**: usuario
- **Senha**: password

**Registro de Novos Usuários:**
- Acesse a página de login e clique em "Cadastre-se aqui" para criar uma nova conta.

## Solução de Problemas

### Erro: "Class Database not found"
- Verifique se o arquivo `config/database.php` existe
- Confirme as permissões de leitura do arquivo

### Erro: "Connection error"
- Verifique se o MySQL está rodando
- Confirme as credenciais no arquivo `config/database.php`
- Teste a conexão manualmente: `mysql -u cinetime -pcinetime123 cinetime_db`

### Erro 403 Forbidden
- Verifique as permissões dos arquivos
- Confirme se o mod_rewrite está habilitado
- Verifique a configuração do virtual host

### Erro 404 Not Found
- Verifique se o arquivo `.htaccess` existe na raiz do projeto
- Confirme se o mod_rewrite está funcionando
- Teste com o servidor PHP integrado

### Problemas com CSS/JS
- Verifique se os arquivos estão na pasta `public/css/` e `public/js/`
- Confirme as permissões de leitura
- Limpe o cache do navegador

## Configurações Adicionais

### Para Produção:
1. Altere as credenciais do banco de dados
2. Desabilite a exibição de erros PHP
3. Configure HTTPS
4. Implemente backup automático do banco

### Para Desenvolvimento:
1. Habilite a exibição de erros PHP
2. Use o servidor PHP integrado para testes rápidos
3. Configure logs detalhados

## Estrutura de Arquivos Importante

```
cinetime/
├── public/index.php          # Ponto de entrada da aplicação
├── config/database.php       # Configurações do banco
├── .htaccess                 # Regras de reescrita de URL
├── database/                 # Scripts SQL
└── app/                      # Código da aplicação
```

## Suporte

Para problemas durante a instalação:
1. Verifique os logs do Apache: `/var/log/apache2/error.log`
2. Verifique os logs do MySQL: `/var/log/mysql/error.log`
3. Teste cada componente individualmente
4. Consulte a documentação oficial do PHP/MySQL/Apache

