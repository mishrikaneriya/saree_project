<?php
session_start();
require 'config.php'; // Ensure this file includes the database connection

// Check if user is logged in
if (!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in']) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Access the user's email from the session
$user_email = $_SESSION['user_email'];

// Example query to fetch user data or perform other actions
$stmt = $con->prepare("SELECT * FROM tbl_user WHERE email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // You can now access user data, e.g., $user['username']
} else {
    // Handle case where user does not exist
    echo "User not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to your Dashboard</h2>
        <p>Email: <?php echo htmlspecialchars($user_email); ?></p>
        <!-- Add more user-related content here -->
    </div>
</body>
</html>
