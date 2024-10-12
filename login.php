<?php
session_start();
include("config.php"); // Make sure this path is correct

$c = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die(mysqli_connect_error());

if (isset($_POST['btnlogin'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpass'];

    // Use prepared statements to prevent SQL injection
    $stmt = $c->prepare("SELECT user_id, password, role FROM tbl_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            echo "<script>alert('Invalid password.')</script>";
        }
    } else {
        echo "<script>alert('No user found with this email.')</script>";
    }
}
?>

<!-- Your HTML form remains the same -->


<html>
    <head>
        <script language="javascript" type="text/javascript">
            window.history.forward();
        </script>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/login.css">

        <script>
            function validate(){
            var email, pwd;
            email = document.form.txtemail.value;
            pwd = document.form.txtpass.value;
            if (email == ")
            {
            alert("please enter valid email");
            return false();
            }
            if (pwd == ")
            {
            alert("please enter valid password");
            return false();
            }
            return true;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <form method="post" class="Login-form">

                <div class="forms-container">
                    <div class="login">

                        <h2 class="title">Login</h2>
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="text" name="txtemail"  placeholder="Email" required>
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="txtpass" placeholder="Password" required>
                        </div>
                        <div class="pass">

                            <div class="forgot-pass"><a href="forgotpasslink.php" class="forgetpass">Forgot Password?</a></div>
                        </div>

                        <input type="submit" name="btnlogin" value="Login" class="btn solid">

                        <p>Don't have an account?<a href="signup.php">SignUp</a></p>
                    </div>
                </div>
            </form>
    </body>
</html>