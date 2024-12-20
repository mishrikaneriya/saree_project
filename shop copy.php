<?php
// shop.php

// Include the database connection file
include 'config.php'; // Make sure this path is correct

// Fetch product data from the database
$query = "SELECT * FROM tbl_product"; // Adjust this based on your table structure
$result = mysqli_query($conn, $query);

// Check if query execution was successful
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop - SareeStore</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Bootstrap Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navigation Bar -->
  <header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto flex items-center justify-between p-4">
      <a href="index.php" class="text-2xl font-bold text-pink-600">SareeStore</a>
      <ul class="flex space-x-6 text-gray-700">
        <li><a href="index.php" class="hover:text-pink-600">Home</a></li>
        <li><a href="shop.php" class="hover:text-pink-600">Shop</a></li>
        <li><a href="about.php" class="hover:text-pink-600">About</a></li>
        <li><a href="contact.php" class="hover:text-pink-600">Contact</a></li>
        <li><a href="login.php" class="hover:text-pink-600">Login</a></li>
      </ul>
    </nav>
  </header>

  <!-- Shop Section -->
  <section id="shop" class="py-20">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-center mb-12">Our Collection</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <?php
        // Display each product
        if (mysqli_num_rows($result) > 0) {
          while ($product = mysqli_fetch_assoc($result)) {
            echo '
              <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="product.php?id='.$product['id'].'">
                  <img src="assets/images/'.$product['image'].'" alt="'.$product['name'].'" class="w-full h-64 object-cover">
                </a>
                <div class="p-4">
                  <h3 class="text-lg font-semibold">'.$product['name'].'</h3>
                  <p class="text-gray-600 mb-4">₹'.number_format($product['price'], 2).'</p>
                  <div class="flex justify-between items-center">
                    <a href="add_to_wishlist.php?id='.$product['id'].'" class="text-pink-600 hover:text-pink-700"><i class="bi bi-heart-fill"></i> Wishlist</a>
                    <a href="add_to_cart.php?id='.$product['id'].'" class="text-pink-600 hover:text-pink-700"><i class="bi bi-cart-fill"></i> Add to Cart</a>
                  </div>
                </div>
              </div>
            ';
          }
        } else {
          echo '<p class="text-center text-gray-600">No products available at the moment.</p>';
        }
        ?>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-6 text-center">
    <p>&copy; 2024 SareeStore. All rights reserved.</p>
  </footer>

  <!-- JavaScript Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
