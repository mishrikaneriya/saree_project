<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wishlist</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Navigation Bar -->
  <header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto flex items-center justify-between p-4">
      <a href="index.php" class="text-2xl font-bold text-pink-600">SareeStore</a>
      <ul class="flex space-x-6 text-gray-700">
        <li><a href="index.php" class="hover:text-pink-600">Home</a></li>
        <li><a href="shop.php" class="hover:text-pink-600">Shop</a></li>
        <li><a href="user_dashboard.php" class="hover:text-pink-600">Dashboard</a></li>
        <li><a href="wishlist.php" class="hover:text-pink-600">Wishlist</a></li>
        <li><a href="logout.php" class="hover:text-pink-600">Logout</a></li>
      </ul>
    </nav>
  </header>

  <!-- Wishlist Section -->
  <section class="py-20">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-center mb-12">Your Wishlist</h2>

      <!-- Wishlist Items -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        // Fetch items from the wishlist table in the database
        include 'db_connection.php';
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM wishlist WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
              <img src="assets/images/' . $row['image'] . '" alt="' . $row['product_name'] . '" class="w-full h-64 object-cover">
              <div class="p-4">
                <h3 class="text-lg font-semibold">' . $row['product_name'] . '</h3>
                <p class="text-gray-600 mb-4">₹' . $row['price'] . '</p>
                <div class="flex justify-between items-center">
                  <a href="remove_from_wishlist.php?item_id=' . $row['id'] . '" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Remove</a>
                  <a href="shop.php" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition">Shop More</a>
                </div>
              </div>
            </div>';
          }
        } else {
          echo '<p class="text-center text-gray-700">Your wishlist is empty.</p>';
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
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" d
