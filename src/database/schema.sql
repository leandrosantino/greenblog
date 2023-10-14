-- Active: 1697236100467@@127.0.0.1@3306
create table user (
	user_id int not null primary key,
    email varchar(40),
    password varchar(40),
    username varchar(16)
);

create table posts (
	post_id int not null primary key,
    owner_id int not null references user(user_id),
    content text,
    created_at timestamp
);

create table comments (
	id int not null primary key,
    post_id int not null references posts(post_id),
    owner_id int not null references user(user_id),
    content text,
    created_at timestamp
);

create table categories (
    category_id int not null primary key,
    category_name varchar(50)
);

create table post_categories (
    post_id int not null,
    category_id int not null,
    primary key (post_id, category_id),
    foreign key (post_id) references posts(post_id),
    foreign key (category_id) references categories(category_id)
);

create table tags (
    tag_id int not null primary key,
    tag_name varchar(50)
);

create table post_tags (
    post_id int not null,
    tag_id int not null,
    primary key (post_id, tag_id),
    foreign key (post_id) references posts(post_id),
    foreign key(tag_id) references tags(tag_id)
);


INSERT INTO user VALUES (3, 'leandrosantino@gmail.com','alpha45c','leandro')