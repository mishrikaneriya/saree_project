<?php include 'header.php'; ?>
<?php
// Start the session at the very top
//session_start();

// Include database connection
include 'config.php'; // Replace with your actual database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION['user_id']; // Now this should work
$query = "SELECT first_name, last_name, email, phone FROM tbl_users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $first_name = htmlspecialchars($user['first_name']);
    $last_name = htmlspecialchars($user['last_name']);
    $email = htmlspecialchars($user['email']);
    $phone = htmlspecialchars($user['phone']);
} else {
    // Fallback if no user is found
    $first_name = "Guest";
    $last_name = "";
    $email = "Not Available";
    $phone = "Not Available";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .dashboard-header {
      background-color: #FF5678;
      color: white;
      padding: 20px;
      text-align: center;
    }
    .card {
      transition: transform 0.2s;
    }
    .card:hover {
      transform: scale(1.05);
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
<body>



<div class="container mx-auto py-8">
  <h2 class="text-3xl font-bold text-center mb-12">User Dashboard</h2>
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Account Overview -->
    <div class="card bg-white rounded-lg shadow-md p-6">
      <h2 class="text-xl font-semibold mb-4">Account Overview</h2>
      <p>Welcome back, <strong><?php echo $first_name . " " . $last_name; ?></strong></p>
      <p class="mt-2">Email: <strong><?php echo $email; ?></strong></p>
      <p class="mt-2">Phone: <strong><?php echo $phone; ?></strong></p>
      <a href="profile.php" class="text-pink-600 hover:underline mt-4 inline-block">Edit Profile</a>
    </div>

    <!-- Orders Section -->
    <div class="card bg-white rounded-lg shadow-md p-6">
      <h2 class="text-xl font-semibold mb-4">Your Orders</h2>
      <ul class="space-y-4">
        <li>
          <span class="font-semibold">Order #1234</span> - ₹2500.00 - <span class="text-green-600">Delivered</span>
        </li>
        <li>
          <span class="font-semibold">Order #1235</span> - ₹3200.00 - <span class="text-yellow-600">Shipped</span>
        </li>
      </ul>
      <a href="orders.php" class="text-pink-600 hover:underline mt-4 inline-block">View All Orders</a>
    </div>

    <!-- Wishlist -->
    <div class="card bg-white rounded-lg shadow-md p-6">
      <h2 class="text-xl font-semibold mb-4">Wishlist</h2>
      <div class="space-y-4">
        <div class="flex items-center justify-between">
          <span>Silk Saree</span>
          <button class="icon-btn">
            <i class="bi bi-cart-fill"></i> <!-- Add to Cart Icon -->
          </button>
        </div>
        <div class="flex items-center justify-between">
          <span>Leather Jacket</span>
          <button class="icon-btn">
            <i class="bi bi-cart-fill"></i> <!-- Add to Cart Icon -->
          </button>
        </div>
      </div>
      <a href="wishlist.php" class="text-pink-600 hover:underline mt-4 inline-block">View All Wishlist Items</a>
    </div>

  </div>
</div>

<footer class="bg-gray-900 text-white py-6 text-center">
    <p>&copy; 2024 SareeStore. All rights reserved.</p>
  </footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
