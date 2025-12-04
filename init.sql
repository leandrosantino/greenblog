CREATE DATABASE IF NOT EXISTS greenblog;
USE greenblog;
-- =======================================================
-- 1. TABELA DE USUÁRIOS
-- Mudanças: Nome 'user' -> 'users', Senha 40 -> 255 chars
-- =======================================================
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =======================================================
-- 2. TABELA DE CATEGORIAS
-- =======================================================
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =======================================================
-- 3. TABELA DE TAGS
-- =======================================================
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `tag_id` int NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =======================================================
-- 4. TABELA DE POSTS 
-- Mudanças: owner_id -> user_id, Adicionado Title
-- =======================================================
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL, -- Pode ser NULL se usuário for deletado
  `title` varchar(255) NOT NULL, -- Adicionado (não existia no original)
  `content` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  -- Chave Estrangeira com Lógica Reddit:
  CONSTRAINT `fk_posts_users`
    FOREIGN KEY (`user_id`) 
    REFERENCES `users` (`user_id`) 
    ON DELETE SET NULL 
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =======================================================
-- 5. TABELA DE COMENTÁRIOS (Estilo Reddit)
-- Mudanças: owner_id -> user_id
-- =======================================================
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `user_id` int NULL, -- Pode ser NULL
  `content` text,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  -- Se o post sumir, o comentário some:
  CONSTRAINT `fk_comments_posts`
    FOREIGN KEY (`post_id`) 
    REFERENCES `posts` (`post_id`) 
    ON DELETE CASCADE,
  -- Se o usuário sumir, o comentário fica (como Anônimo):
  CONSTRAINT `fk_comments_users`
    FOREIGN KEY (`user_id`) 
    REFERENCES `users` (`user_id`) 
    ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =======================================================
-- 6. PIVÔ POSTS <-> CATEGORIAS
-- =======================================================
DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE `post_categories` (
  `post_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`post_id`, `category_id`),
  CONSTRAINT `fk_pc_posts` 
    FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_pc_categories` 
    FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =======================================================
-- 7. PIVÔ POSTS <-> TAGS
-- =======================================================
DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE `post_tags` (
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL,
  PRIMARY KEY (`post_id`, `tag_id`),
  CONSTRAINT `fk_pt_posts` 
    FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_pt_tags` 
    FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Adicionar coluna subtitle na tabela posts existente
ALTER TABLE posts ADD COLUMN subtitle varchar(255) AFTER title;

-- Criar tabela de Favoritos (Relacionamento N:N entre User e Post)
CREATE TABLE IF NOT EXISTS `favorite` (
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  PRIMARY KEY (`user_id`, `post_id`),
  CONSTRAINT `fk_fav_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_fav_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
