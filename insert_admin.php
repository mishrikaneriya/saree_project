<?php
include("config.php");

// Create a database connection
$c = getDbConnection();

// Admin user details
$email = 'admin123@gmail.com';
$password = 'admin123'; // Change this to a secure password

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the insert query
$sql = "INSERT INTO tbl_login (email, user_pass) VALUES (?, ?)";
$stmt = $c->prepare($sql);
$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute()) {
    echo "Admin user added successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$c->close();
?>
