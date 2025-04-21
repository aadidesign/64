-- VEHICLE TYPES
CREATE TABLE vehicle_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50),
    toll_charge DECIMAL(10,2)
);

-- USERS / VEHICLES
CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    owner_name VARCHAR(100),
    vehicle_number VARCHAR(50) UNIQUE,
    vehicle_type_id INT,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vehicle_type_id) REFERENCES vehicle_types(id)
);

-- TOLL BOOTHS
CREATE TABLE toll_booths (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booth_name VARCHAR(100),
    location VARCHAR(255)
);

-- TOLL RECORDS
CREATE TABLE toll_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_id INT,
    booth_id INT,
    toll_amount DECIMAL(10,2),
    passed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id),
    FOREIGN KEY (booth_id) REFERENCES toll_booths(id)
);
