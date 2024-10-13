<?php
require 'config.php'; // Make sure to include your database config file

$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT); // Change 'admin123' to your desired password

$sql = "INSERT INTO admin_users (username, password) VALUES (?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "Admin user created successfully.";
} else {
    echo "Error: " . $stmt->error;
}
?>
