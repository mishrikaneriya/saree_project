<?php
// Start session and check for user_id
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

// Sanitize user_id
$user_id = intval($_SESSION['user_id']); // Convert to integer for safety

$query = "SELECT * FROM tbl_orders WHERE user_id = $user_id ORDER BY order_date DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Orders</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gray-100 text-gray-800">
  <header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto flex items-center justify-between p-4">
      <a href="index.php" class="text-2xl font-bold text-pink-600">SareeStore</a>
      <ul class="flex space-x-6 text-gray-700">
        <li><a href="index.php" class="hover:text-pink-600">Home</a></li>
        <li><a href="shop.php" class="hover:text-pink-600">Shop</a></li>
        <li><a href="user_dashboard.php" class="hover:text-pink-600">Dashboard</a></li>
        <li><a href="wishlist.php" class="hover:text-pink-600">Wishlist</a></li>
        <li><a href="orders.php" class="hover:text-pink-600">Orders</a></li>
        <li><a href="logout.php" class="hover:text-pink-600">Logout</a></li>
      </ul>
    </nav>
  </header>
  <section class="py-20">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-center mb-12">Your Orders</h2>
      <div class="bg-white rounded-lg shadow p-6">
        <div class="overflow-x-auto">
          <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
              <tr>
                <th class="px-4 py-2 bg-gray-200 text-gray-600 font-bold">Order ID</th>
                <th class="px-4 py-2 bg-gray-200 text-gray-600 font-bold">Date</th>
                <th class="px-4 py-2 bg-gray-200 text-gray-600 font-bold">Items</th>
                <th class="px-4 py-2 bg-gray-200 text-gray-600 font-bold">Total</th>
                <th class="px-4 py-2 bg-gray-200 text-gray-600 font-bold">Status</th>
                <th class="px-4 py-2 bg-gray-200 text-gray-600 font-bold">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo '
                      <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-4 py-2">' . $row['order_id'] . '</td>
                        <td class="px-4 py-2">' . date("d M Y", strtotime($row['order_date'])) . '</td>
                        <td class="px-4 py-2">' . $row['total_items'] . '</td>
                        <td class="px-4 py-2">₹' . $row['total_price'] . '</td>
                        <td class="px-4 py-2 text-' . ($row['status'] == 'Delivered' ? 'green' : 'orange') . '-600">' . $row['status'] . '</td>
                        <td class="px-4 py-2">
                          <a href="order_details.php?order_id=' . $row['order_id'] . '" class="text-blue-600 hover:underline">View Details</a>
                          <a href="track_order.php?order_id=' . $row['order_id'] . '" class="ml-4 text-pink-600 hover:underline">Track</a>
                        </td>
                      </tr>';
                  }
              } else {
                  echo '<tr><td colspan="6" class="px-4 py-6 text-center text-gray-700">You have no orders yet.</td></tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-gray-900 text-white py-6 text-center">
    <p>&copy; 2024 SareeStore. All rights reserved.</p>
  </footer>
</body>
</html>
