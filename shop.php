<?php
include 'config.php'; // Database connection

// Check if there's a search query
$search_query = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

$query = "SELECT * FROM tbl_product WHERE pname LIKE '%$search_query%' OR type LIKE '%$search_query%'";
$result = mysqli_query($conn, $query);

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
<?php
include 'header.php';
?>
<!-- Navigation Bar -->
<!-- <header class="bg-white shadow-md sticky top-0 z-50">
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
</header> -->

<!-- Search Box Section -->
<section id="search" class="py-4 bg-white shadow-sm">
    <div class="container mx-auto">
        <form action="shop.php" method="GET" class="flex items-center justify-center space-x-4">
            <input type="text" name="search" placeholder="Search products by name or type" value="<?php echo htmlspecialchars($search_query); ?>"
                class="w-full sm:w-96 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
            <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded-md hover:bg-pink-700">
                <i class="bi bi-search"></i> Search
            </button>
        </form>
    </div>
</section>

<!-- Shop Section -->
<section id="shop" class="py-20">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-12">Our Collection</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    $id = $product['product_id'];
                    $name = $product['pname'];
                    $price = $product['price'];
                    $description = $product['description'];
                    $fabric = $product['fabric'];
                    $color = $product['color'];
                    $image = $product['image_url'] ?? 'assets/images/default.jpg'; // Default image if URL is missing

                    echo '
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <a href="product.php?id=' . $id . '">
                                <img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($name) . '" class="w-full h-64 object-cover">
                            </a>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">' . htmlspecialchars($name) . '</h3>
                                <p class="text-gray-600 mb-4">₹' . number_format($price, 2) . '</p>
                                
                                <!-- Display Description, Fabric, and Color -->
                                <p class="text-sm text-gray-700 mb-2">Description: ' . htmlspecialchars($description) . '</p>
                                <p class="text-sm text-gray-700 mb-2">Fabric: ' . htmlspecialchars($fabric) . '</p>
                                <p class="text-sm text-gray-700 mb-4">Color: ' . htmlspecialchars($color) . '</p>
                                
                                <!-- Add to Cart and Wishlist buttons -->
                                <div class="flex justify-between items-center">
                                    <a href="add_to_wishlist.php?id=' . $id . '" class="text-pink-600 hover:text-pink-700"><i class="bi bi-heart-fill"></i> Wishlist</a>
                                    <a href="add_to_cart.php?id=' . $id . '" class="text-pink-600 hover:text-pink-700"><i class="bi bi-cart-fill"></i> Add to Cart</a>
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
