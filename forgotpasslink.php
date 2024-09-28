<html>
    <head>
        <script language="javascript" type="text/javascript">
            window.history.forward();
        </script>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">

    </head>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        
        
        body , input{
            font-family:Arial, Helvetica, sans-serif;
        }

        .container{
            position: relative;
            width: 100%;
            min-height: 100vh;
            background-color: #fff;
            overflow: hidden;
        }

        .forms-container{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .forgotpass{
            position: absolute;
            top: 50%;
            left: 50%;
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

        form.forgotpass-form{
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

        .label{
            margin-right: 250px;
            margin-bottom: 0px;
            margin-top: 10px;
        }

    </style>

    <body>
        <div class="container">
            <div class="forms-container">
                <div class="forgotpass">

                    <form method="POST" class="forgotpass-form">
                        <h2 class="title">Forgot Password</h2>


                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="text" name="txtemail"  placeholder="Email" required>
                        </div>

                        <input type="submit" name="btnforgotpass" value="Send OTP" class="btn solid">

                    </form>
                </div>
            </div>
        </div>

    </body>
</html>




<?php
$emailErr = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["txtemail"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = test_input($_POST["txtemail"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
$c = mysqli_connect("localhost", "root", "", "sareeproject")or die(mysqli_connect_error());

// $email = $_POST['txtemail'];

$qu = "select * from tbl_registration where email= '$email'";
$q = mysqli_query($c, $qu);
if ($q) {

    if (mysqli_num_rows($q) == 1) {
        $row = mysqli_fetch_array($q, MYSQLI_ASSOC);
        $email_check = $row['email'];

        if (!$email == $email_check) {
            echo "<script>alert('Email not found.')</script>";
        } else {
            button1($email);
            echo "<script>alert('OTP send to your Email ID.')</script>";

            echo '<script>location.replace("forgotpass.php")</script>';
        }
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST["txtemail"];


function button1($email) {
    //session_start();
    $otp_code = rand(1000, 9999);

    $_SESSION["OTP"] = $otp_code;
    //$timestamp = $_SERVER["REQUEST_TIME"];
    //$_SESSION["TIME"] = $timestamp;

    require 'C:\xampp\htdocs\PhpProject1\PHPMailer-master\src\PHPMailer.php';
    require 'C:\XAMPP\htdocs\PhpProject1\PHPMailer-master\src\Exception.php';
    require 'C:\XAMPP\htdocs\PhpProject1\PHPMailer-master\src\SMTP.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '22bmiit171@gmail.com';
        $mail->Password = 'yjgwdrkcdqiteqhl ';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('22bmiit171@gmail.com');
        $mail->addAddress("$email"); //user address
        $mail->isHTML(true);
        $mail->Subject = 'OTP transfer';
        $mail->Body = "$otp_code";

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    // Your email sending code here...


    /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Store form data in session variables

      $_SESSION['email'] = $_POST['txtemail'];
      } */
}
?>

