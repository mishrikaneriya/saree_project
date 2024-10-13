<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("location: login.php");
    exit;
}

// Assuming you have the user's username stored in the session
$username = $_SESSION['username'];

require 'config.php';

// Fetch user data from the database
$stmt = $conn->prepare("SELECT * FROM tbl_user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
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
    <div class="dashboard-container">
        <h2>Welcome, <?php echo htmlspecialchars($user['full_name']); ?>!</h2>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
        
        <!-- Navigation Links -->
        <div class="dashboard-links">
            <a href="profile.php">View Profile</a>
            <a href="changepassword.php">Change Password</a>
            <a href="vieworder.php">View Orders</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
