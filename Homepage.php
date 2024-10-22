<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login if not logged in
    header("Location: login.php");
    exit();
}

// Your homepage content goes here
?>

<?php
include 'header.php'; 

    ob_start();
        session_start();
        ob_end_clean();
        /*if(isset($_SESSION["txtname"])){
             header("Location: Login.php");
        }
        if(!isset($_SESSION["txtname"])){
           ob_start();
            header("Location: Login.php");
            ob_end_clean();
        }*/
        
     $con= mysqli_connect("localhost","root","","sareeproject")or die("Error");
     session_destroy();
?>

<style>
    body{
            
            background:url(./images.png)no-repeat;
            background-position: center;
            background-size: cover;
        }
</style>

<html>
    <head>
        <script language="javascript" type="text/javascript">
            window.history.forward();
        </script>
        <meta charset="UTF-8">
        <title>Home page</title>
    </head>
    
    <body><div class="wrapper">
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

<
        <h1>Welcome</h1>
        <h2><a href="login.php">Logout</a></h2>
        
    </body>
</html>
