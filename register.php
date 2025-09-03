<?php
// Enable full error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include "db.php";
    
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }
    
    // Get form data
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $phone = $conn->real_escape_string($_POST['phone']);
    $role = $conn->real_escape_string($_POST['role']);
    
    // Validate password strength - FIXED REGEX SYNTAX
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        die("Password must be at least 8 characters with uppercase, lowercase, number, and special character");
    }
    
    // Check if email already exists
    $check_email = $conn->query("SELECT id FROM users WHERE email = '$email'");
    if ($check_email->num_rows > 0) {
        die("Email already exists. Please use a different email.");
    }
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    // Insert into users table
    $sql = "INSERT INTO users (email, password, phone_number, role) 
            VALUES ('$email', '$hashed_password', '$phone', '$role')";
    
    if ($conn->query($sql)) {
        $user_id = $conn->insert_id;
        
        // Insert into appropriate profile table based on role
        if ($role === 'msme') {
            $business_name = $conn->real_escape_string($_POST['business_name']);
            $business_type = $conn->real_escape_string($_POST['business_type']);
            
            $profile_sql = "INSERT INTO msme_profiles (user_id, business_name, business_type) 
                           VALUES ('$user_id', '$business_name', '$business_type')";
        } elseif ($role === 'ssf') {
            $facility_name = $conn->real_escape_string($_POST['facility_name']);
            $facility_location = $conn->real_escape_string($_POST['facility_location']);
            $facility_type = $conn->real_escape_string($_POST['facility_type']);
            
            $profile_sql = "INSERT INTO ssf_profiles (user_id, facility_name, facility_location, facility_type) 
                           VALUES ('$user_id', '$facility_name', '$facility_location', '$facility_type')";
        }
        
        if (isset($profile_sql) && $conn->query($profile_sql)) {
            // Registration successful - redirect to login
            header("Location: index.html?registration=success");
            exit();
        } else {
            echo "Error creating profile: " . $conn->error;
        }
    } else {
        echo "Error creating user: " . $conn->error;
    }
    
    $conn->close();
} else {
    // Show form if not POST request
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <h2>Registration Form</h2>
        <p>Please use the main registration form on the index page.</p>
        <a href="index.html">Go to Registration</a>
    </body>
    </html>
    <?php
}
?>