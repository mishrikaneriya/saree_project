<?php
session_start();
include 'config.php'; // Database connection

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id']; // Assuming the user ID is stored in the session
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($product_id > 0) {
    // Insert into cart table
    $query = "INSERT INTO tbl_cart (user_id, product_id) VALUES ('$user_id', '$product_id')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product added to cart successfully!'); window.location.href='shop.php';</script>";
    } else {
        echo "<script>alert('Failed to add product to cart.'); window.location.href='shop.php';</script>";
    }
} else {
    echo "<script>alert('Invalid product ID.'); window.location.href='shop.php';</script>";
}
?>
