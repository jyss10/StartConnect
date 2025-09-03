<?php
include "db.php";

// Create database if it doesn't exist
$conn->query("CREATE DATABASE IF NOT EXISTS startconnect");
$conn->select_db("startconnect");

// Create tables if they don't exist
$tables = [
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        phone_number VARCHAR(20),
        role ENUM('msme', 'ssf', 'admin') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB",
    
    "CREATE TABLE IF NOT EXISTS msme_profiles (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        business_name VARCHAR(255),
        business_type VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB",
    
    "CREATE TABLE IF NOT EXISTS ssf_profiles (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        facility_name VARCHAR(255),
        facility_location VARCHAR(255),
        facility_type VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    ) ENGINE=InnoDB"
];

foreach ($tables as $sql) {
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully or already exists.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
}

// Create a default admin user
$admin_email = "admin@startconnect.com";
$admin_password = password_hash("Admin123!", PASSWORD_BCRYPT);
$check_admin = $conn->query("SELECT id FROM users WHERE email = '$admin_email'");

if ($check_admin->num_rows == 0) {
    $conn->query("INSERT INTO users (email, password, phone_number, role) 
                 VALUES ('$admin_email', '$admin_password', '1234567890', 'admin')");
    echo "Admin user created (email: admin@startconnect.com, password: Admin123!).<br>";
}

echo "Database setup completed!";
$conn->close();
?>