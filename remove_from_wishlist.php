<?php

include 'config.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    die('You must be logged in to remove items.');
}

$user_id = $_SESSION['user_id'];
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Validate product ID
if ($product_id <= 0) {
    die('Invalid product ID.');
}

// Remove the product from the wishlist
$query = "DELETE FROM tbl_wishlist WHERE user_id = $user_id AND product_id = $product_id";
$result = mysqli_query($conn, $query);

if ($result) {
    header('Location: wishlist.php');
} else {
    echo 'Error removing item: ' . mysqli_error($conn);
}
?>
