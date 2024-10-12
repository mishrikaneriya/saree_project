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
    
    <body>
        <h1>Welcome</h1>
        <h2><a href="login.php">Logout</a></h2>
        
    </body>
</html>