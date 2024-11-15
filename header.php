<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saree Project</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
    /* Custom styles */
body {
    font-family: 'Helvetica', sans-serif;
  }
  
  h1, h2, h3 {
    color: #E91E63;
  }
  
  .btn-primary {
    background-color: #E91E63;
    color: white;
  }
  
  .btn-primary:hover {
    background-color: #D81B60;
  }
    </style>
</head>
<body class="bg-gray-100">
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
      </header>
</body>
</html>
