CREATE DATABASE classifieds_db;
USE classifieds_db;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 0,
    register_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    two_factor_secret VARCHAR(255) DEFAULT NULL
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE ads (
    ad_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    post_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    ad_id INT NOT NULL,
    sender_id INT NOT NULL,
    recipient_id INT NOT NULL,
    message TEXT NOT NULL,
    send_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ad_id) REFERENCES ads(ad_id),
    FOREIGN KEY (sender_id) REFERENCES users(user_id),
    FOREIGN KEY (recipient_id) REFERENCES users(user_id)
);
CREATE TABLE password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE ads
ADD COLUMN location VARCHAR(255) NOT NULL;

ALTER TABLE ads ADD COLUMN image_path VARCHAR(255) NULL;

INSERT INTO users (username, email, password, is_active) VALUES ('JoaoSilva', 'joao@example.com', 'senhaSegura123', 1);
INSERT INTO categories (name) VALUES ('Eletrônicos'), ('Moda'),
('Informática'),
('Esportes'),
('Móveis'),
('Livros');

INSERT INTO ads (user_id, category_id, title, description, price, location, image_path) VALUES
(37, 10, 'Camiseta Polo', 'Camiseta polo azul, tamanho M.', 50.00, 'São Paulo', 'https://imgmilena.s3.eu-north-1.amazonaws.com/camiseta_polo.jpeg'),
(38, 11, 'Notebook Profissional', 'Notebook profissional ideal para trabalho e estudo.', 2800.00, 'Rio de Janeiro', 'https://imgmilena.s3.eu-north-1.amazonaws.com/notebook_profissional.jpeg'),
(39, 12, 'Bicicleta Speed', 'Bicicleta speed modelo 2023, pouco uso.', 1200.00, 'Belo Horizonte', 'https://imgmilena.s3.eu-north-1.amazonaws.com/bicicleta_speed.jpeg'),
(40, 13, 'Sofá Retrátil', 'Sofá retrátil 4 lugares, cor cinza.', 1500.00, 'Curitiba', 'https://imgmilena.s3.eu-north-1.amazonaws.com/sofa_retratil.jpeg'),
(41, 14, 'Coleção de Livros Clássicos', 'Coleção com 10 livros clássicos da literatura mundial.', 200.00, 'Porto Alegre', 'https://imgmilena.s3.eu-north-1.amazonaws.com/colecao_livros_classicos.jpeg'),
(42, 11, 'Notebook Gamer', 'Descrição do notebook gamer.', 5000.00, 'Recife', 'https://imgmilena.s3.eu-north-1.amazonaws.com/notebook.jpeg'),
(43, 9, 'Smartphone XYZ', 'Descrição do smartphone XYZ.', 1500.00, 'Rio de Janeiro', 'https://imgmilena.s3.eu-north-1.amazonaws.com/smartphone_xyz.jpeg'),
(44, 9, 'IPhone 15 Pro Max', '15 pro', 1500.00, 'João Pessoa', 'https://imgmilena.s3.eu-north-1.amazonaws.com/iphone15.jpeg');


DELETE FROM ads;
DELETE FROM categories;
DELETE FROM users;

SET SQL_SAFE_UPDATES = 1;

USE classifieds_db;

SELECT user_id, username FROM users;

SELECT category_id, name FROM categories;


INSERT INTO users (username, email, password, is_active) VALUES
('milena', 'milena@gmail.com', 'senha123', 1),
('monica', 'monica@gmail.com', 'senha123', 1),
('debora', 'debora@gmail.com', 'senha123', 1),
('Pedro', 'pedro@example.com', 'senha123', 1),
('Joao', 'joao@example.com', 'senha123', 1),
('Maria', 'maria@example.com', 'senha123', 1),
('Ana', 'ana@example.com', 'senha123', 1),
('Lucas', 'lucas@example.com', 'senha123', 1);


INSERT INTO ads (user_id, category_id, title, description, price, location, image_path) VALUES
(37, 10, 'Camiseta Polo', 'Camiseta polo azul, tamanho M.', 50.00, 'São Paulo', 'https://imgmilena.s3.eu-north-1.amazonaws.com/camiseta_polo.jpeg'),
(38, 2, 'Notebook Profissional', 'Notebook profissional ideal para trabalho e estudo.', 2800.00, 'Rio de Janeiro', 'https://imgmilena.s3.eu-north-1.amazonaws.com/notebook_profissional.jpeg'),
(39, 4, 'Bicicleta Speed', 'Bicicleta speed modelo 2023, pouco uso.', 1200.00, 'Belo Horizonte', 'https://imgmilena.s3.eu-north-1.amazonaws.com/bicicleta_speed.jpeg'),
(40, 5, 'Sofá Retrátil', 'Sofá retrátil 4 lugares, cor cinza.', 1500.00, 'Curitiba', 'https://imgmilena.s3.eu-north-1.amazonaws.com/sofa_retratil.jpeg'),
(41, 6, 'Coleção de Livros Clássicos', 'Coleção com 10 livros clássicos da literatura mundial.', 200.00, 'Porto Alegre', 'https://imgmilena.s3.eu-north-1.amazonaws.com/colecao_livros_classicos.jpeg'),
(42, 1, 'Notebook Gamer', 'Descrição do notebook gamer.', 5000.00, 'Recife', 'https://imgmilena.s3.eu-north-1.amazonaws.com/notebook.jpeg'),
(43, 1, 'Smartphone XYZ', 'Descrição do smartphone XYZ.', 1500.00, 'Rio de Janeiro', 'https://imgmilena.s3.eu-north-1.amazonaws.com/smartphone_xyz.jpeg'),
(44, 1, 'IPhone 15 Pro Max', '15 pro', 1500.00, 'João Pessoa', 'https://imgmilena.s3.eu-north-1.amazonaws.com/iphone15.jpeg');