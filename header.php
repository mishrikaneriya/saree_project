<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Fetch user details from the session or database
$username = $_SESSION['username']; // Assuming you store the username in the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Basic styling for the navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            font-family: Arial, sans-serif;
        }
        .navbar-left a, .navbar-right a {
            text-decoration: none;
            margin: 0 10px;
            color: #333;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .navbar-left a:hover, .navbar-right a:hover {
            color: #007bff;
        }
        .navbar-right span {
            margin-right: 10px;
            font-weight: bold;
        }
        /* Responsive design for mobile view */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .navbar-left, .navbar-right {
                display: flex;
                flex-direction: column;
                width: 100%;
                align-items: flex-start;
            }
            .navbar-left a, .navbar-right a {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <a href="Homepage.php">Home</a>
            <a href="vieworder.php">Orders</a>
            <a href="viewcustomer.php">Customers</a>
        </div>
        <div class="navbar-right">
    <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Profile Image" width="30" height="30" style="border-radius: 50%;">
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
</div>
    </div>
</body>
</html>
