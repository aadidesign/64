CREATE DATABASE bookstore;
USE bookstore;

-- Table for Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);

-- Table for Books
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(100),
    genre VARCHAR(50),
    price DECIMAL(6,2)
);

-- Sample data
INSERT INTO books (title, author, genre, price) VALUES
('The Alchemist', 'Paulo Coelho', 'Fiction', 250.00),
('Clean Code', 'Robert C. Martin', 'Programming', 500.00),
('The Bhagavad Gita', 'Vyasa', 'Spiritual', 150.00);
