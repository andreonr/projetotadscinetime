-- Inserir dados de exemplo para o CineTime

-- Inserir usuário de teste
INSERT INTO users (username, password, email) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@cinetime.com'),
('usuario', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'usuario@cinetime.com');
-- Senha para ambos: password

-- Inserir gêneros
INSERT INTO genres (name) VALUES 
('Ação'),
('Drama'),
('Comédia'),
('Terror'),
('Ficção Científica'),
('Romance'),
('Thriller'),
('Aventura'),
('Animação'),
('Documentário');

-- Inserir filmes de exemplo
INSERT INTO movies (title, synopsis, release_year, poster_url, genre_id) VALUES 
(
    'O Poderoso Chefão',
    'A história da família Corleone, uma das mais poderosas famílias da máfia italiana nos Estados Unidos. Don Vito Corleone é o chefe desta família e está envelhecendo. Quando um mafioso rival tenta matá-lo, seu filho mais novo, Michael, que sempre evitou os negócios da família, se vê obrigado a entrar no mundo do crime para proteger sua família.',
    1972,
    'https://image.tmdb.org/t/p/w500/3bhkrj58Vtu7enYsRolD1fZdja1.jpg',
    2
),
(
    'Pulp Fiction',
    'Pulp Fiction retrata três histórias interligadas que seguem as desventuras de dois assassinos profissionais, um boxeador, um gângster e sua esposa, e um par de bandidos de lanchonete em quatro contos de violência e redenção.',
    1994,
    'https://image.tmdb.org/t/p/w500/d5iIlFn5s0ImszYzBPb8JPIfbXD.jpg',
    2
),
(
    'Matrix',
    'Neo é um jovem programador que trabalha durante o dia e é hacker durante a noite. Ele é contatado por Morpheus, que lhe revela que a realidade como ele conhece é na verdade uma simulação controlada por máquinas, e que ele pode ser "O Escolhido" para libertar a humanidade.',
    1999,
    'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg',
    5
),
(
    'Forrest Gump',
    'Forrest Gump é um homem com QI abaixo da média que, sem perceber, influencia alguns dos eventos mais importantes do século XX nos Estados Unidos. Sua jornada extraordinária o leva desde a infância no Alabama até se tornar um herói de guerra, um astro do ping-pong e um empresário de sucesso.',
    1994,
    'https://image.tmdb.org/t/p/w500/arw2vcBveWOVZr6pxd9XTd1TdQa.jpg',
    2
),
(
    'Vingadores: Ultimato',
    'Após os eventos devastadores de Vingadores: Guerra Infinita, o universo está em ruínas devido às ações de Thanos. Com a ajuda de aliados remanescentes, os Vingadores devem se reunir mais uma vez para desfazer as ações de Thanos e restaurar a ordem no universo.',
    2019,
    'https://image.tmdb.org/t/p/w500/or06FN3Dka5tukK1e9sl16pB3iy.jpg',
    1
),
(
    'Coringa',
    'Arthur Fleck é um homem que luta para encontrar seu lugar na sociedade de Gotham. Com problemas mentais, ele trabalha como palhaço para uma agência de talentos e sonha em se tornar um comediante stand-up. Porém, uma série de eventos trágicos o leva a abraçar o caos e se tornar o icônico vilão conhecido como Coringa.',
    2019,
    'https://image.tmdb.org/t/p/w500/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg',
    7
),
(
    'Toy Story 4',
    'Woody sempre teve certeza sobre seu lugar no mundo e que sua prioridade era cuidar de sua criança, seja Andy ou Bonnie. Mas quando Bonnie adiciona um novo brinquedo relutante chamado "Garfinho" ao seu quarto, uma aventura com velhos e novos amigos mostrará a Woody o quão grande o mundo pode ser para um brinquedo.',
    2019,
    'https://image.tmdb.org/t/p/w500/w9kR8qbmQ01HwnvK4alvnQ2ca0L.jpg',
    9
),
(
    'Parasita',
    'A família Kim vive em um porão sujo e apertado, mas é unida e feliz. Um dia, o filho mais velho, Ki-woo, é indicado por um amigo para dar aulas particulares para a filha de uma família rica. Ao entrar na casa dos Park, Ki-woo vê uma oportunidade para toda sua família sair da pobreza.',
    2019,
    'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg',
    7
),
(
    'Interestelar',
    'No futuro, a Terra está morrendo devido a uma praga que destrói as plantações. Cooper, um ex-piloto da NASA que agora é fazendeiro, é recrutado para uma missão secreta que pode salvar a humanidade: viajar através de um buraco de minhoca para encontrar um novo lar para a espécie humana.',
    2014,
    'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg',
    5
),
(
    'O Rei Leão',
    'Simba é um jovem leão cujo destino é se tornar rei da Pedra do Reino. No entanto, após a morte trágica de seu pai Mufasa, Simba foge de casa acreditando ser responsável pela morte do pai. Anos depois, ele deve retornar para enfrentar seu passado e reclamar seu lugar como rei.',
    2019,
    'https://image.tmdb.org/t/p/w500/dzBtMocZuJbjLOXvrl4zGYigDzh.jpg',
    9
);

