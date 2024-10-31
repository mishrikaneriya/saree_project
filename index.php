<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saree Selling Website</title>
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
        <li><a href="about.php" class="hover:text-pink-600">About</a></li>
        <li><a href="contact.php" class="hover:text-pink-600">Contact</a></li>
        <li><a href="login.php" class="hover:text-pink-600">Login</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section id="home" class="bg-pink-100 py-20 text-center">
    <div class="container mx-auto">
      <h1 class="text-4xl font-extrabold text-pink-700 mb-4">Elegant Sarees for Every Occasion</h1>
      <p class="text-lg text-gray-700 mb-8">Discover the latest styles in traditional and modern sarees.</p>
      <a href="shop.php" class="bg-pink-600 text-white py-3 px-6 rounded-full hover:bg-pink-700 transition">Shop Now</a>
    </div>
  </section>

  <!-- Featured Products Section -->
  <section id="shop" class="py-20">
    <div class="container mx-auto">
      <h2 class="text-3xl font-bold text-center mb-12">Featured Sarees</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Sample Product Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="assets/images/saree1.jpg" alt="Saree 1" class="w-full h-64 object-cover">
          <div class="p-4">
            <h3 class="text-lg font-semibold">Classic Silk Saree</h3>
            <p class="text-gray-600 mb-4">₹2500.00</p>
            <button class="bg-pink-600 text-white w-full py-2 rounded-md hover:bg-pink-700 transition">Add to Cart</button>
          </div>
        </div>
        <!-- Repeat Product Card as needed -->
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="bg-gray-50 py-20">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold mb-6">About Us</h2>
      <p class="text-lg text-gray-700 mb-4">We provide a wide selection of sarees to match your every need, from casual to festive occasions.</p>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-20 bg-pink-50">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold mb-6">Contact Us</h2>
      <p class="text-gray-700 mb-6">Have questions? Reach out to us for more information.</p>
      <form action="contact.php" method="POST" class="space-y-4">
        <input type="text" name="name" placeholder="Name" class="w-full p-3 border rounded-md">
        <input type="email" name="email" placeholder="Email" class="w-full p-3 border rounded-md">
        <textarea name="message" placeholder="Message" class="w-full p-3 border rounded-md"></textarea>
        <button type="submit" class="bg-pink-600 text-white py-3 px-6 rounded-md hover:bg-pink-700 transition">Send Message</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-6 text-center">
    <p>&copy; 2024 SareeStore. All rights reserved.</p>
  </footer>

  <!-- JavaScript Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
  <script src="assets/js/script.js"></script>
</body>
</html>
