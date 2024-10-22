<!DOCTYPE html>
<?php 
session_start();
require 'config.php';
include 'header.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admindashboard.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="wrapper">
    <nav class="sidebar">
        <div class="sidebar-header">
 <!-- <h1>Welcome, Admin <?php echo htmlspecialchars($_SESSION['admin_username']); ?>!</h1> -->
            <h3>Admin Panel</h3>
        </div>
        <ul class="list-unstyled components">
            <li><a href="Admin_Dashboard.php">Home</a></li>
            <li><a href="viewcustomer.php">View Customers</a></li>
            <li><a href="manageproduct.php">Manage Products</a></li>
            <li><a href="vieworder.php">View Orders</a></li>
            <li><a href="viewcancel.php">View Canceled Orders</a></li>
            <li><a href="viewreview.php">View Reviews</a></li>
        </ul>
        <a href="logout.php" class="logout-button">Logout</a>
    </nav>

    <div class="content">
        <header>
            <h2>Home</h2>
        </header>
        <p>Welcome to the Admin Panel</p>
    </div>
</div>

<script>
   $(document).ready(function() {
    // Sidebar link click AJAX load
    $('.sidebar ul li a').on('click', function(event) {
        event.preventDefault();
        var pageUrl = $(this).attr('href');

        $.ajax({
            url: pageUrl,
            type: 'GET',
            success: function(data) {
                $('.content').html(data);
            },
            error: function() {
                alert('Failed to load page');
            }
        });
    });
});
</script>
</body>
</html>
