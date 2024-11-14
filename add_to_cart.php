<?php
// Start session if not already started
//session_start();

// Database connection
include('config.php');

// Check if the user is logged in and if product_id and quantity are provided
if (isset($_SESSION['user_id']) && isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    // Check if the product already exists in the cart for this user
    $query = $conn->prepare("SELECT * FROM tbl_cart WHERE user_id = ? AND product_id = ?");
    $query->bind_param("ii", $user_id, $product_id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // If product exists, update the quantity
        $update = $conn->prepare("UPDATE tbl_cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?");
        $update->bind_param("iii", $quantity, $user_id, $product_id);
        $update->execute();
        echo json_encode(['status' => 'success', 'message' => 'Product quantity updated in cart']);
    } else {
        // If product doesn't exist, insert new record
        $insert = $conn->prepare("INSERT INTO tbl_cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
        $insert->bind_param("iii", $user_id, $product_id, $quantity);
        $insert->execute();
        echo json_encode(['status' => 'success', 'message' => 'Product added to cart']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in or missing product information']);
}
?>
