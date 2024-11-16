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
<?php
include 'header.php';

include 'config.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo '<p class="text-center text-gray-700">Please <a href="login.php" class="text-pink-600">log in</a> to view your wishlist.</p>';
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch items from the wishlist and product tables
$query = "
SELECT p.product_id, p.pname, p.price, p.image_url 
FROM tbl_wishlist w
INNER JOIN tbl_product p ON w.product_id = p.product_id
WHERE w.user_id = $user_id";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo '<p class="text-center text-red-600">Error fetching wishlist: ' . mysqli_error($conn) . '</p>';
    exit;
}
?>
  <!-- Wishlist Section -->
  <section class="py-20">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-center mb-12">Your Wishlist</h2>

      <!-- Wishlist Items -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $image_url = !empty($row['image_url']) ? htmlspecialchars($row['image_url']) : 'default.jpg';
                $pname = htmlspecialchars($row['pname']);
                $price = '₹' . number_format($row['price'], 2);

                echo "
                <div class='bg-white rounded-lg shadow-md overflow-hidden'>
                    <img src='assets/images/$image_url' alt='$pname' class='w-full h-64 object-cover'>
                    <div class='p-4'>
                        <h3 class='text-lg font-semibold'>$pname</h3>
                        <p class='text-gray-600 mb-4'>$price</p>
                        <div class='flex justify-between items-center'>
                            <a href='remove_from_wishlist.php?product_id={$row['product_id']}' 
                               class='bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition'>Remove</a>
                            <a href='shop.php' class='bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition'>Shop More</a>
                        </div>
                    </div>
                </div>";
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
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
</body>
</html>
