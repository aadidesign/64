CREATE DATABASE emailapp;
USE emailapp;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    token VARCHAR(100),
    status VARCHAR(20) DEFAULT 'unverified'
);
