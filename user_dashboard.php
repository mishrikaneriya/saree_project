<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* Additional custom styling */
    .dashboard-header {
      background-color: #FF5678;
      color: white;
    }
    .icon-btn {
      color: #FF5678;
      cursor: pointer;
      transition: color 0.3s;
    }
    .icon-btn:hover {
      color: #ff1a4d;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

<?php
include 'header.php';
?>
  <!-- Dashboard Header
  <header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto flex items-center justify-between p-4">
      <a href="index.php" class="text-2xl font-bold text-pink-600">SareeStore</a>
      <ul class="flex space-x-6 text-gray-700">
        <li><a href="index.php" class="hover:text-pink-600">Home</a></li>
        <li><a href="./shop.php" class="hover:text-pink-600">Shop</a></li>
        <li><a href="user_dashboard.php" class="hover:text-pink-600">Dashboard</a></li>
        <li><a href="wishlist.php" class="hover:text-pink-600">Wishlist</a></li>
        <li><a href="orders.php" class="hover:text-pink-600">Orders</a></li>
        <li><a href="logout.php" class="hover:text-pink-600">Logout</a></li>
      </ul>
    </nav>
  </header> -->
  <div class="container mx-auto">
  <h2 class="text-3xl font-bold text-center mb-12">user Dashboard</h2>
  <!-- Dashboard Content -->
  <div class="container mx-auto py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
 
      <!-- Account Overview -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Account Overview</h2>
        <p>Welcome back, [bhargavtz]</p>
        <p class="mt-2">Email: [bhargavtz@yandex.com]</p>
        <p class="mt-2">Phone: [8141100131]</p>
        <a href="profile.php" class="text-pink-600 hover:underline mt-4 inline-block">Edit Profile</a>
      </div>

      <!-- Orders Section -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Your Orders</h2>
        <ul class="space-y-4">
          <li>
            <span class="font-semibold">Order #1234</span> - ₹2500.00 - <span class="text-green-600">Delivered</span>
          </li>
          <li>
            <span class="font-semibold">Order #1235</span> - ₹3200.00 - <span class="text-yellow-600">Shipped</span>
          </li>
          <a href="orders.php" class="text-pink-600 hover:underline mt-4 inline-block">View All Orders</a>
        </ul>
      </div>

      <!-- Wishlist -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Wishlist</h2>
        <div class="space-y-4">
          <div class="flex items-center justify-between">
            <span>Silk Saree</span>
            <button class="icon-btn">
              <i class="bi bi-cart-fill"></i> <!-- Add to Cart Icon -->
            </button>
          </div>
          <div class="flex items-center justify-between">
            <span>Banarasi Saree</span>
            <button class="icon-btn">
              <i class="bi bi-cart-fill"></i> <!-- Add to Cart Icon -->
            </button>
          </div>
          <a href="wishlist.php" class="text-pink-600 hover:underline mt-4 inline-block">View All Wishlist Items</a>
        </div>
      </div>

    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-4 text-center">
    <p>&copy; 2024 SareeStore. All rights reserved.</p>
  </footer>

  <!-- JavaScript Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
</body>
</html>