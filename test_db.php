<?php
include "db.php";

echo "Testing database connection...<br>";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connection successful!<br>";
}

// Test if tables exist
$tables = ['users', 'msme_profiles', 'ssf_profiles'];
foreach ($tables as $table) {
    $result = $conn->query("SHOW TABLES LIKE '$table'");
    if ($result->num_rows > 0) {
        echo "Table '$table' exists.<br>";
    } else {
        echo "Table '$table' does NOT exist.<br>";
    }
}
?>