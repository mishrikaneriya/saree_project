<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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

    <!-- Registration Section -->
    <section id="registration" class="py-20">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">Registration</h2>
            <div class="flex justify-center">
                <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
                    <form method="POST" class="space-y-6">
                        <!-- First Name -->
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="txtfname" placeholder="First name" class="w-full p-3 border rounded-md" required>
                        </div>

                        <!-- Last Name -->
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="txtlname" placeholder="Last name" class="w-full p-3 border rounded-md" required>
                        </div>

                        <!-- Contact No -->
                        <div class="input-field">
                            <i class="fa-solid fa-phone"></i>
                            <input type="text" maxlength="10" pattern="[0-9]{10}" name="txtcontact" placeholder="Contact No." class="w-full p-3 border rounded-md" required>
                        </div>

                        <!-- Email -->
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email" class="w-full p-3 border rounded-md" required>
                        </div>

                        <!-- City Dropdown -->
                        <div class="input-field">
                            <i class="fa-solid fa-city"></i>
                            <select name="city" class="w-full p-3 border rounded-md" required>
                                <option value="" disabled selected>Select your city</option>
                                <?php
                                include('config.php');
                                $city = mysqli_query($conn, "SELECT * FROM tbl_city");
                                while ($c = mysqli_fetch_array($city)) {
                                ?>
                                    <option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- Address -->
                        <div class="input-field">
                            <i class="fa-solid fa-house"></i>
                            <input type="text" name="address" placeholder="Address" class="w-full p-3 border rounded-md" required>
                        </div>

                        <!-- Pincode -->
                        <div class="input-field">
                            <i class="fa-solid fa-location-pin"></i>
                            <input type="text" name="pincode" maxlength="6" pattern="[0-9]{6}" placeholder="Pincode" class="w-full p-3 border rounded-md" required>
                        </div>
                        <!-- State -->
                        <div class="input-field">
                            <i class="fa-solid fa-city"></i>
                            <input type="password" name="password" placeholder="password" class="w-full p-3 border rounded-md" required>
                        </div>
                        <!-- Submit Button -->
                        <div class="flex justify-center">
                            <input type="submit" name="btnregister" value="Register" class="btn bg-pink-600 text-white py-3 px-6 rounded-full hover:bg-pink-700 transition">
                        </div>
                    </form>
                </div>
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
    <script src="assets/js/script.js"></script>
</body>

</html>

<?php
// Database connection and form handling logic
$c = mysqli_connect("localhost", "root", "", "sareeproject") or die(mysqli_connect_error());

if (isset($_POST['btnregister'])) {
    $fname = $_POST['txtfname'];
    $lname = $_POST['txtlname'];
    $contact_no = $_POST['txtcontact'];
    $email = $_POST['email'];
    $city = $_POST['city']; 
    $address = $_POST['address'];
    $password = $_POST['paasword'];
    $pincode = $_POST['pincode'];
 

    $otp=ramd
    
}
?>