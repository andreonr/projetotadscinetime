# CineTime - Sistema de Catálogo de Filmes

## Descrição do Projeto

O CineTime é um sistema web de catálogo de filmes desenvolvido em PHP orientado a objetos, inspirado na interface do Popcorn Time. O sistema permite que usuários façam login para acessar um catálogo completo de filmes, visualizando informações como sinopse, ano de lançamento, gênero e cartazes dos filmes.

Este projeto foi desenvolvido como trabalho acadêmico para aplicar conceitos de programação orientada a objetos, arquitetura MVC, modelagem de banco de dados e desenvolvimento web full-stack.

## Funcionalidades

### Principais Recursos:
- **Sistema de Autenticação**: Login, registro e logout de usuários
- **Catálogo de Filmes**: Visualização em cards com cartazes dos filmes
- **Detalhes dos Filmes**: Página individual com sinopse completa
- **Sistema de Busca**: Pesquisa por título do filme
- **Filtros por Gênero**: Filtragem de filmes por categoria
- **Interface Responsiva**: Design adaptável para diferentes dispositivos
- **Design Inspirado no Popcorn Time**: Interface moderna e atrativa

### Funcionalidades Técnicas:
- **CRUD Completo**: Operações de Create, Read, Update e Delete para filmes e usuários
- **Arquitetura MVC**: Separação clara entre Models, Views e Controllers
- **Orientação a Objetos**: Classes bem estruturadas com encapsulamento
- **Segurança**: Senhas criptografadas e proteção contra SQL Injection
- **Banco de Dados Relacional**: Estrutura normalizada com chaves estrangeiras

## Tecnologias Utilizadas

- **Backend**: PHP 8.1+ (Orientado a Objetos)
- **Banco de Dados**: MySQL 8.0
- **Frontend**: HTML5, CSS3, JavaScript
- **Servidor Web**: Apache 2.4
- **Arquitetura**: MVC (Model-View-Controller)

## Estrutura do Projeto

```
cinetime/
├── app/
│   ├── controllers/
│   │   ├── AuthController.php
│   │   └── MovieController.php
│   ├── models/
│   │   ├── User.php
│   │   ├── Movie.php
│   │   └── Genre.php
│   └── views/
│       ├── auth/
│       │   └── login.php
│       ├── movies/
│       │   ├── index.php
│       │   └── show.php
│       └── layouts/
│           ├── header.php
│           └── footer.php
├── config/
│   └── database.php
├── database/
│   ├── database_schema.sql
│   └── sample_data.sql
├── public/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
│   ├── images/
│   │   └── no-poster.jpg
│   └── index.php
├── .htaccess
└── README.md
```

## Instalação e Configuração

### Pré-requisitos:
- PHP 8.1 ou superior
- MySQL 8.0 ou superior
- Servidor web Apache
- Extensões PHP: PDO, PDO_MySQL

### Passos para Instalação:

1. **Clone ou baixe o projeto**
   ```bash
   git clone [URL_DO_REPOSITORIO]
   cd cinetime
   ```

2. **Configure o banco de dados**
   ```sql
   CREATE DATABASE cinetime_db;
   CREATE USER 'cinetime'@'localhost' IDENTIFIED BY 'cinetime123';
   GRANT ALL PRIVILEGES ON cinetime_db.* TO 'cinetime'@'localhost';
   FLUSH PRIVILEGES;
   ```

3. **Execute os scripts SQL**
   ```bash
   mysql -u cinetime -p cinetime_db < database/database_schema.sql
   mysql -u cinetime -p cinetime_db < database/sample_data.sql
   ```

4. **Configure o servidor web**
   - Copie o projeto para o diretório do servidor web
   - Configure um virtual host apontando para a pasta `public/`
   - Habilite o mod_rewrite do Apache

5. **Ajuste as configurações**
   - Verifique as credenciais do banco em `config/database.php`
   - Ajuste as permissões dos arquivos se necessário

### Execução com Servidor PHP Integrado:
```bash
cd public/
php -S localhost:8080
```

## Como Usar

### Acesso ao Sistema:
1. Acesse o sistema através do navegador
2. Faça login com as credenciais:
   - **Usuário**: admin
   - **Senha**: password

### Navegação:
- **Página Principal**: Catálogo com todos os filmes
- **Busca**: Digite o nome do filme na barra de pesquisa
- **Filtros**: Selecione um gênero para filtrar os filmes
- **Detalhes**: Clique em um filme para ver informações completas
- **Logout**: Use o botão "Sair" no menu superior

## Modelagem do Banco de Dados

### Diagrama Entidade-Relacionamento (DER):
[Link para o DER](cinetime_erd.png)

### Estrutura das Tabelas:

**Tabela: users**
- id (INT, PK, AUTO_INCREMENT)
- username (VARCHAR(50), UNIQUE)
- password (VARCHAR(255))
- email (VARCHAR(100), UNIQUE)
- created_at (DATETIME)

**Tabela: genres**
- id (INT, PK, AUTO_INCREMENT)
- name (VARCHAR(50), UNIQUE)

**Tabela: movies**
- id (INT, PK, AUTO_INCREMENT)
- title (VARCHAR(255))
- synopsis (TEXT)
- release_year (INT)
- poster_url (VARCHAR(255))
- genre_id (INT, FK → genres.id)
- created_at (DATETIME)

## Arquitetura e Padrões

### Padrão MVC:
- **Models**: Representam as entidades e lógica de dados
- **Views**: Interface do usuário e apresentação
- **Controllers**: Lógica de negócio e controle de fluxo

### Orientação a Objetos:
- **Encapsulamento**: Propriedades privadas com métodos públicos
- **Abstração**: Classes bem definidas para cada entidade
- **Reutilização**: Código modular e reutilizável

### Segurança:
- Senhas criptografadas com password_hash()
- Prepared statements para prevenir SQL Injection
- Sanitização de dados de entrada
- Controle de sessão para autenticação

**Credenciais de teste**:
- Usuário: admin
- Senha: password



## Licença

Este projeto foi desenvolvido para fins acadêmicos