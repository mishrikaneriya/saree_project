<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - SareeStore</title>
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

  <!-- Contact Section -->
  <section class="py-20 bg-pink-50">
    <div class="container mx-auto text-center">
      <h1 class="text-4xl font-bold text-pink-700 mb-6">Contact Us</h1>
      <p class="text-lg text-gray-700 max-w-2xl mx-auto mb-8">
        Have questions? Reach out to us for more information, and we’ll get back to you as soon as possible.
      </p>

      <!-- Contact Form -->
      <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-8">
        <form action="contact.php" method="POST" class="space-y-6">
          <div>
            <label for="name" class="block text-left text-gray-600 mb-2">Name</label>
            <input type="text" id="name" name="name" placeholder="Your Name" class="w-full p-3 border rounded-md">
          </div>
          <div>
            <label for="email" class="block text-left text-gray-600 mb-2">Email</label>
            <input type="email" id="email" name="email" placeholder="Your Email" class="w-full p-3 border rounded-md">
          </div>
          <div>
            <label for="message" class="block text-left text-gray-600 mb-2">Message</label>
            <textarea id="message" name="message" placeholder="Your Message" class="w-full p-3 border rounded-md"></textarea>
          </div>
          <button type="submit" class="bg-pink-600 text-white w-full py-3 rounded-md hover:bg-pink-700 transition">Send Message</button>
        </form>
      </div>

      <!-- Contact Details -->
      <div class="mt-12">
        <h2 class="text-2xl font-semibold text-gray-700">Our Contact Information</h2>
        <p class="text-gray-600 mt-4">Phone: +91 12345 67890</p>
        <p class="text-gray-600">Email: support@sareestore.com</p>
        <p class="text-gray-600">Address: 123 Saree Street, Fashion City, India</p>
      </div>

      <!-- Google Maps Embed -->
      <div class="mt-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.8357273153!2d144.95592281531956!3d-37.81827087975148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce6e0!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1629802849441!5m2!1sen!2sau" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
