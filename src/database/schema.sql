-- Active: 1698888367937@@127.0.0.1@3306

create table
    if not exists user (
        user_id integer primary key autoincrement,
        email varchar(40),
        password varchar(40),
        username varchar(16),
        isAdmin BOOLEAN NOT NULL
    );

create table
    if not exists posts (
        post_id integer primary key autoincrement,
        owner_id int not null references user(user_id),
        title varchar(100),
        content text,
        created_at timestamp DEFAULT CURRENT_TIMESTAMP,
        subtitle text(100)
    );

create table
    if not exists comments (
        id integer primary key autoincrement,
        post_id int not null references posts(post_id),
        owner_id int not null references user(user_id),
        content text,
        created_at timestamp DEFAULT CURRENT_TIMESTAMP
    );

create table
    if not exists categories (
        category_id integer primary key autoincrement,
        category_name varchar(50)
    );

create table
    if not exists post_categories (
        post_id integer not null,
        category_id integer not null,
        primary key (post_id, category_id),
        foreign key (post_id) references posts(post_id),
        foreign key (category_id) references categories(category_id)
    );

create table
    if not exists tags (
        tag_id integer primary key autoincrement,
        tag_name varchar(50)
    );

create table
    if not exists post_tags (
        post_id integer not null,
        tag_id integer not null,
        primary key (post_id, tag_id),
        foreign key (post_id) references posts(post_id),
        foreign key(tag_id) references tags(tag_id)
    );

INSERT INTO
    user(
        email,
        password,
        username,
        isAdmin
    )
VALUES (
        'leandrosantino@gmail.com',
        'alpha45c',
        'leandro',
        TRUE
    );

INSERT INTO
    user(
        email,
        password,
        username,
        isAdmin
    )
VALUES (
        'teste@gmail.com',
        '123456',
        'user',
        FALSE
    );

INSERT INTO
    posts (
        owner_id,
        title,
        subtitle,
        content
    )
VALUES (
        1,
        '10 Dicas para um Jardim Sustentável',
        'subtitulo',
        'Neste post, exploraremos 10 dicas essenciais para criar um jardim sustentável que não apenas embeleza sua casa, mas também beneficia o meio ambiente. Desde a escolha de plantas nativas até a implementação de técnicas de conservação de água, você descobrirá maneiras de tornar seu jardim mais ecológico. Além disso, forneceremos orientações sobre como compostar resíduos de jardim e criar habitats para a vida selvagem local. Transforme seu espaço verde em um santuário de sustentabilidade com essas ideias incríveis!'
    );

INSERT INTO
    posts (
        owner_id,
        title,
        subtitle,
        content
    )
VALUES (
        1,
        'Viajando com Orçamento Limitado: 7 Destinos Acessíveis para Explorar',
        'subtitulo',
        'Se você está sonhando com uma escapada, mas o orçamento está apertado, não se preocupe. Neste post, compartilhamos uma lista de sete destinos de viagem incríveis que são acessíveis para todos os tipos de viajantes. Desde as praias tropicais de Bali até as paisagens deslumbrantes das Montanhas Rochosas, você encontrará opções para todos os gostos. Vamos também dar dicas sobre como economizar dinheiro em acomodações, alimentação e transporte enquanto desfruta de experiências inesquecíveis. Não deixe que o orçamento limite seus sonhos de viagem - comece a planejar sua próxima aventura agora!'
    );

SELECT
    comments.*,
    posts.title,
    posts.post_id
FROM comments
    INNER JOIN posts ON comments.post_id = posts.post_id
WHERE comments.owner_id = 1;