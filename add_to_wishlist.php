<?php

include 'config.php'; // Include your database connection

// if (!isset($_SESSION['user_id'])) {
//     // Redirect to login page if user is not logged in
//     header('Location: login.php');
//     exit();
// }

$user_id = intval($_SESSION['user_id']); // Safely retrieve user ID from session
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($product_id > 0) {
    // Check if the product is already in the wishlist
    $check_query = "SELECT * FROM tbl_wishlist WHERE user_id = ? AND product_id = ?";
    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, 'ii', $user_id, $product_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        
        echo "<script>alert('This product is already in your wishlist.'); window.location.href='shop.php';</script>";
    } else {
        // Insert into wishlist table
        $insert_query = "INSERT INTO tbl_wishlist (user_id, product_id) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, 'ii', $user_id, $product_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Product added to wishlist successfully!'); window.location.href='shop.php';</script>";
        } else {
            echo "<script>alert('Failed to add product to wishlist.'); window.location.href='shop.php';</script>";
        }
    }
    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('Invalid product ID.'); window.location.href='shop.php';</script>";
}

mysqli_close($conn); // Close the database connection
?>
