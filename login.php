<?php
session_start();
//include("userlogin.php");
$c = new mysqli('localhost', 'root', '', 'sareeproject') or die(mysqli_connect_error());

if (isset($_POST['btnlogin'])) {


    //admin login
    if ( $_POST['txtemail'] == "admin123@gmail.com" && $_POST['txtpass'] == "admin123") {

        echo "<script>alert('Login successfully.')</script> ";
        echo "<script>location.replace('Homepage.php')</script>";
    } else {
        //customer login
        if ($_POST['txtemail'] == email && $_POST['txtpass'] == user_pass) {

            echo "<script>alert('Login successfully.')</script> ";
            echo "<script>location.replace('Homepage.php')</script>";
        } else {
            echo "<script>alert('Invalid details. ')</script> ";
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
        <link rel="stylesheet" href="style.css">

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
    <style>

        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{

            background:url(./images.png)no-repeat;
            background-position: center;
            background-size: cover;

        }

        body , input{
            font-family:Arial, Helvetica, sans-serif;


        }

        .forms-container{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .login{
            position: absolute;
            top: 50%;
            left: 60%;
            transform: translate(-50%,-50%);
            width: 50%;
            display: grid;
            grid-template-columns: 1fr;
            z-index: 5;
        }


        form{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 5rem;
            overflow: hidden;
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            ;
        }

        form.Login-form{
            z-index: 2;
        }

        .title{
            font-size: 2.2rem;
            color: #444;
            margin-bottom: 10px;

        }


        .input-field{
            max-width: 380px;
            width: 100%;
            height: 55px;
            background-color: #f0f0f0;
            margin: 10px 0;
            border-radius: 55px;
            display: grid;
            grid-template-columns: 15% 85%;
            padding: 0 .4rem;
        }

        .input-field i{
            text-align: center;
            line-height: 55px;
            color: #acacac;
            font-size: 1.1rem;
        }

        .input-field input{
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }

        .input-field input::placeholder{
            color: #aaa;
            font-weight: 500;
        }

        .btn{
            max-width: 380px;
            width: 100%;
            height: 55px;
            border: none;
            outline: none;
            border-radius: 55px;
            cursor: pointer;
            background-color: #5995fd;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            margin: 10px 0;
            transition: .5s;
            margin-bottom: 15px;
        }

        .btn:hover{
            background-color: #4d84e2;
        }

        .pass{
            display: block;
            margin-top: 5px;
            margin-bottom: 10x;

        }

        .forgot-pass{
            margin-left: 240px;
        }



    </style>
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