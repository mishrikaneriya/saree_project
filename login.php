<?php
session_start();

// Database connection
$c = mysqli_connect("localhost", "root", "", "sareeproject");

// Check connection
if (!$c) {
    die("Connection failed: " . mysqli_connect_error());
}

// Login functionality
if (isset($_POST['btnlogin'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpass'];

    $_SESSION['email'] = $email;

    // Check if admin
    if ($email == 'admin123@gmail.com' && $password == 'admin123') {
        echo "<script>alert('Login successfully.')</script>";
        header('location: admindashboard.php');
        exit();
    } else {
        // Query to check user credentials
        $sql = "SELECT user_id, email, password FROM tbl_login WHERE email = '$email'";
        $result = mysqli_query($c, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Fetch user data
            $row = mysqli_fetch_assoc($result);

            $passwordFromDatabase = $row['password'];

            // Compare passwords
            if ($password == $passwordFromDatabase) {
                // Store user_id in session
                $_SESSION['user_id'] = $row['user_id'];

                echo "<script>alert('Login successfully.')</script>";
                header("Location: user_dashboard.php");
                exit();
            } else {
                echo "<div class='error-message'>Invalid Password.</div>";
            }
        } else {
            echo "<div class='error-message'>Email Not Found. Please Sign up First.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            background-size: cover;
            font-family: Arial, Helvetica, sans-serif;
        }
        .forms-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login {
            width: 380px;
            padding: 2rem;
            background-color: #f0f0f0;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 2.2rem;
            color: #444;
            margin-bottom: 20px;
            text-align: center;
        }
        .input-field {
            margin: 10px 0;
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .input-field i {
            margin-right: 10px;
            color: #acacac;
        }
        .input-field input {
            border: none;
            outline: none;
            padding: 10px;
            width: 100%;
            font-size: 1rem;
        }
        .btn {
            width: 100%;
            height: 55px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #5995fd;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            margin: 20px 0;
            transition: background-color 0.5s;
        }
        .btn:hover {
            background-color: #4d84e2;
        }
        .pass {
            text-align: right;
            margin: 10px 0;
        }
        .error-message {
            color: red;
            margin: 10px 0;
            text-align: center;
            margin-top: 10px;
        }
    </style>

    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["txtemail"].value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Email format
            
            // Email validation
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="forms-container">
        <div class="login">
            <h2 class="title">Login</h2>
            <form name="loginForm" method="POST" class="Login-form" onsubmit="return validateForm()">
                <div class="input-field">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" name="txtemail" placeholder="Email" required>
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="txtpass" placeholder="Password" required>
                </div>
                <div class="pass">
                    <a href="forgotpasslink.php" class="forgot-pass">Forgot Password?</a>
                </div>
                <input type="submit" name="btnlogin" value="Login" class="btn solid">
                <p>Don't have an account? <a href="signup.php">SignUp</a></p>
                <div class="error-message"></div>
            </form>
        </div>
    </div>
</body>
</html>
