CREATE DATABASE IF NOT EXISTS toll_db;

USE toll_db;

CREATE TABLE toll_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_no VARCHAR(50) NOT NULL,
    vehicle_type VARCHAR(50),
    date_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    amount DECIMAL(10,2)
);



✅ How to Run
Put the files in /opt/lampp/htdocs/toll-tax/

Start XAMPP

bash
Copy code
sudo /opt/lampp/lampp start
Create DB:

Open http://localhost/phpmyadmin

Import toll.sql

Run App:

Visit: http://localhost/toll-tax/index.php