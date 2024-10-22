<?php
// Start the session
// session_start();
// include 'config.php'; // Include the database connection file

// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php'); // Redirect to login if not logged in
//     exit;
// }

// // Get user ID from session
// $user_id = $_SESSION['user_id'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sareeproject";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Fetch user data from the database
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle form submission for updating user data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    // Update user data in the database
    $update_query = "UPDATE users SET fname = ?, lname = ?, email = ?, contact_no = ?, gender = ?, address = ?, state = ?, city = ?, pincode = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sssssssssi", $fname, $lname, $email, $contact_no, $gender, $address, $state, $city, $pincode, $user_id);

    if ($update_stmt->execute()) {
        $success_message = "Profile updated successfully!";
        // Fetch the updated user data
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
    } else {
        $error_message = "Failed to update profile.";
    }
}


// Handle form submission for updating user data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    // Update user data in the database
    $update_query = "UPDATE users SET fname = ?, lname = ?, email = ?, contact_no = ?, gender = ?, address = ?, state = ?, city = ?, pincode = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sssssssssi", $fname, $lname, $email, $contact_no, $gender, $address, $state, $city, $pincode, $user_id);

    if ($update_stmt->execute()) {
        $success_message = "Profile updated successfully!";
        // Fetch the updated user data
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
    } else {
        $error_message = "Failed to update profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Saree Shop</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item active"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
            </ul>
        </div>
    </nav> -->

    <header class="navbar navbar-expand-lg navbar-light glassmorphism-header p-3">
        <a class="navbar-brand" href="index.php">SareeShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </header>
        
    <div class="container mt-5">
        <h2>Edit Profile</h2>
        <?php if (isset($success_message)): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo isset($user['fname']) ? htmlspecialchars($user['fname']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo isset($user['lname']) ? htmlspecialchars($user['lname']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="contact_no">Contact Number</label>
                <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo isset($user['contact_no']) ? htmlspecialchars($user['contact_no']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Male" <?php echo (isset($user['gender']) && $user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo (isset($user['gender']) && $user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                    <option value="Other" <?php echo (isset($user['gender']) && $user['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address"><?php echo isset($user['address']) ? htmlspecialchars($user['address']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <select class="form-control" id="state" name="state">
                    <option value="Gujarat" <?php echo (isset($user['state']) && $user['state'] == 'Gujarat') ? 'selected' : ''; ?>>Gujarat</option>
                    <option value="Maharashtra" <?php echo (isset($user['state']) && $user['state'] == 'Maharashtra') ? 'selected' : ''; ?>>Maharashtra</option>
                    <!-- Add more states as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" id="city" name="city">
                    <option value="Ahmedabad" <?php echo (isset($user['city']) && $user['city'] == 'Ahmedabad') ? 'selected' : ''; ?>>Ahmedabad</option>
                    <option value="Mumbai" <?php echo (isset($user['city']) && $user['city'] == 'Mumbai') ? 'selected' : ''; ?>>Mumbai</option>
                    <!-- Add more cities as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="pincode">Pincode</label>
                <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo isset($user['pincode']) ? htmlspecialchars($user['pincode']) : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</body>
</html>
