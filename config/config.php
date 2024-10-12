<?php
// Start a session
session_start();

// Database connection parameters
$host = 'localhost';  // Database host
$user = 'root';       // Database username
$password = '';       // Database password
$database = 'sareeproject'; // Database name

// Create a connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
