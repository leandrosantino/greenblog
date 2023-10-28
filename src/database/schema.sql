-- Active: 1697236100467@@127.0.0.1@3306
create table user (
	user_id integer not null primary key autoincrement,
    email varchar(40),
    password varchar(40),
    username varchar(16)
);

create table posts (
	post_id integer not null primary key autoincrement,
    owner_id int not null references user(user_id),
    content text,
    title VARCHAR(100),
    created_at timestamp
);

create table comments (
	id integer not null primary key autoincrement,
    post_id int not null references posts(post_id),
    owner_id int not null references user(user_id),
    content text,
    created_at timestamp
);

create table categories (
    category_id integer not null primary key autoincrement,
    category_name varchar(50)
);

create table post_categories (
    post_id integer not null,
    category_id int not null,
    primary key (post_id, category_id),
    foreign key (post_id) references posts(post_id),
    foreign key (category_id) references categories(category_id)
);

create table tags (
    tag_id integer not null primary key autoincrement,
    tag_name varchar(50)
);

create table post_tags (
    post_id int not null,
    tag_id int not null,
    primary key (post_id, tag_id),
    foreign key (post_id) references posts(post_id),
    foreign key(tag_id) references tags(tag_id)
);


INSERT INTO user VALUES (1, 'leandrosantino@gmail.com','alpha45c','leandro');

INSERT INTO posts (
    owner_id,
    title,
    content
) VALUES (
    1,
    '10 Dicas para um Jardim Sustentável',
    'Neste post, exploraremos 10 dicas essenciais para criar um jardim sustentável que não apenas embeleza sua casa, mas também beneficia o meio ambiente. Desde a escolha de plantas nativas até a implementação de técnicas de conservação de água, você descobrirá maneiras de tornar seu jardim mais ecológico. Além disso, forneceremos orientações sobre como compostar resíduos de jardim e criar habitats para a vida selvagem local. Transforme seu espaço verde em um santuário de sustentabilidade com essas ideias incríveis!'
);

INSERT INTO posts (
    owner_id,
    title,
    content
) VALUES (
    1,
    'Viajando com Orçamento Limitado: 7 Destinos Acessíveis para Explorar',
    'Se você está sonhando com uma escapada, mas o orçamento está apertado, não se preocupe. Neste post, compartilhamos uma lista de sete destinos de viagem incríveis que são acessíveis para todos os tipos de viajantes. Desde as praias tropicais de Bali até as paisagens deslumbrantes das Montanhas Rochosas, você encontrará opções para todos os gostos. Vamos também dar dicas sobre como economizar dinheiro em acomodações, alimentação e transporte enquanto desfruta de experiências inesquecíveis. Não deixe que o orçamento limite seus sonhos de viagem - comece a planejar sua próxima aventura agora!'
);
