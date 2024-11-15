<?php
// Start session if not already started
session_start();

// Database connection
include('config.php');

// Check if the user is logged in and if product_id is provided
if (isset($_SESSION['user_id']) && isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];

    // Check if the product already exists in the wishlist for this user
    $query = $conn->prepare("SELECT * FROM tbl_wishlist WHERE user_id = ? AND product_id = ?");
    $query->bind_param("ii", $user_id, $product_id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'info', 'message' => 'Product already in wishlist']);
    } else {
        // If product doesn't exist, insert new record
        $insert = $conn->prepare("INSERT INTO tbl_wishlist (user_id, product_id) VALUES (?, ?)");
        $insert->bind_param("ii", $user_id, $product_id);
        $insert->execute();
        echo json_encode(['status' => 'success', 'message' => 'Product added to wishlist']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in or missing product information']);
}
?>
