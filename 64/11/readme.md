CREATE DATABASE college_admission;

USE college_admission;

-- Table to store student information
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL,
    admission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
