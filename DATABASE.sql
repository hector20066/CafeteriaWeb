CREATE DATABASE db_cafeteria;
USE db_cafeteria;

CREATE TABLE categories (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL
);

CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT NOT  NULL,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(50) NOT NULL UNIQUE,
    id_category INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    brief_description VARCHAR(150) NOT NULL,
    creation_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_category) REFERENCES categories(id) ON DELETE CASCADE
);

CREATE TABLE characteristics (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_product INT NOT NULL,
    feature VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_product) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE users (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    passwd VARCHAR(300) NOT NULL,
    role VARCHAR(40) NOT NULL
);

CREATE VIEW vw_products AS
SELECT
    p.id,
    p.name,
    p.slug,
    p.price,
    p.image,
    p.description,
    p.brief_description,
    c.name AS category_name,
    GROUP_CONCAT(ch.feature SEPARATOR ', ') AS features
FROM products p
JOIN categories c ON c.id = p.id_category
LEFT JOIN characteristics ch on p.id = ch.id_product
GROUP BY
    p.id,
    p.name,
    p.slug,
    p.price,
    p.image,
    p.description,
    p.brief_description,
    c.name;
