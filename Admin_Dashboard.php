<!DOCTYPE html>
<?php include 'header.php';
include 'config.php';

session_start();
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
        <h1>Welcome, Admin <?php echo $_SESSION['admin_username']; ?>!</h1>
        <p>This is the admin dashboard.</p>
            <h3>Admin Panel</h3>
        </div>
        <ul class="list-unstyled components">
            <li><a href="Admin_Dashboard.php">Home</a></li>
            <li><a href="viewcustomer.php">View customer details</a></li>
            <li><a href="manageproduct.php">Manage products</a></li>
            <li><a href="vieworder.php">View order details</a></li>
            <li><a href="viewcancel.php">View cancel orders</a></li>
            <li><a href="viewreview.php">View Review</a></li>
        </ul>
    </nav>

    <div class="content">
        <header>
            <h2>Home</h2>
        </header>
        <p>Welcome to the Admin Panel</p>
        <div id="loading">
    <div class="spinner"></div>
</div>

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
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(data) {
                $('.content').html(data);
            },
            complete: function() {
                $('#loading').hide();
            },
            error: function() {
                alert('Failed to load page');
            }
        });
    });

    // Toggle sidebar on mobile
    $('.toggle-sidebar').on('click', function() {
        $('.sidebar').toggleClass('active');
    });
});
</script>
<a href="logout.php">Logout</a>
</body>
</html>



