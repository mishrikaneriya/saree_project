<?php

include 'config/config.php';


if (isset($_POST['btnlogin'])) {

    // admin login
    if ($_POST['txtemail'] == "admin123@gmail.com" && $_POST['txtpass'] == "admin123") {
        echo "<script>alert('Login successfully.')</script>";
        echo "<script>location.replace('Homepage.php')</script>";
    } else {
        // customer login
        $email = $_POST['txtemail'];
        $password = $_POST['txtpass'];

        // Query the database to find the user
        $stmt = $conn->prepare("SELECT * FROM tbl_login WHERE email = ? AND user_pass = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            echo "<script>alert('Login successfully.')</script>";
            echo "<script>location.replace('Homepage.php')</script>";
        } else {
            echo "<script>alert('Invalid details.')</script>";
            echo "<script>location.replace('login.php')</script>";
        }
    }
}
?>
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