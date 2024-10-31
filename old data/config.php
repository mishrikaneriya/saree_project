<?php
$servername = "localhost"; // or "127.0.0.1"
$username = "root";
$password = ""; // If you set a password for root, enter it here
$database = "sareeproject";

$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
