<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - SareeStore</title>
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

  <!-- About Us Section -->
  <section class="bg-gray-50 py-20">
    <div class="container mx-auto text-center">
      <h1 class="text-4xl font-bold text-pink-700 mb-6">About SareeStore</h1>
      <p class="text-lg text-gray-700 max-w-2xl mx-auto mb-8">
        At SareeStore, we are dedicated to bringing you the finest and most elegant sarees for every occasion. 
        From traditional silk sarees to contemporary designs, our collection celebrates the beauty of Indian culture 
        with a modern twist.
      </p>
      <img src="assets/images/about-us.jpg" alt="Our Store" class="w-full h-80 object-cover rounded-lg shadow-lg mb-8">
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold text-pink-600 mb-4">Our Mission</h3>
          <p class="text-gray-700">
            Our mission is to bring high-quality, affordable, and stylish sarees to customers worldwide. We believe 
            in preserving tradition while embracing modern fashion, providing sarees that make you feel beautiful 
            and confident.
          </p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold text-pink-600 mb-4">Why Choose Us</h3>
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Premium quality fabrics and craftsmanship</li>
            <li>A wide range of traditional and modern styles</li>
            <li>Personalized customer service</li>
            <li>Fast and reliable shipping</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="py-20 bg-pink-50">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold text-pink-700 mb-6">Meet Our Team</h2>
      <p class="text-lg text-gray-700 mb-8">Our team is passionate about sarees and dedicated to helping you find the perfect fit for any occasion.</p>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Sample Team Member -->
        <div class="bg-white rounded-lg shadow-md p-6">
          <img src="assets/images/team-member1.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-xl font-semibold text-pink-600">Mahek amipara</h3>
          <p class="text-gray-600">backend developer</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
          <img src="assets/images/team-member2.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-xl font-semibold text-pink-600">mansi ---</h3>
          <p class="text-gray-600">backend developer</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
          <img src="assets/images/team-member3.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-xl font-semibold text-pink-600">mishri kaneriya</h3>
          <p class="text-gray-600">Founder & Designer</p>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
          <img src="assets/images/team-member4.jpg" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
          <h3 class="text-xl font-semibold text-pink-600">dhanvi shah</h3>
          <p class="text-gray-600">planner & bug fix</p>
        </div>
       
        <!-- Repeat team members as needed -->
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
