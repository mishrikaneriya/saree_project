<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
    </head>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <style>
        h2{
            text-align: center;
        }
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

        .registration{
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

        form.registration-form{
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
            height: 40px;
            background-color: #f0f0f0;
            margin: 8px 0;
            border-radius: 55px;
            display: grid;
            grid-template-columns: 15% 85%;
            padding: 0 .4rem;
        }

        .input-field i{
            text-align: center;
            line-height: 40px;
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

        .input-radio{
            display: block;
            max-width: 380px;
            width: 100%;
            height: 35px;
            margin: 8px 0;
            grid-template-columns: 1% 85%;
            color: #aaa;
        }

        .btn{
            width: 150px;
            height: 49px;
            border: none;
            outline: none;
            border-radius: 49px;
            cursor: pointer;
            background-color: #5995fd;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            margin: 10px 0;
            transition: .5s;
        }

        .btn:hover{
            background-color: #4d84e2;
        }

    </style>
    <body>
        <h2>Registration</h2>
        <div class="container">
            <div class="forms-container">
                <div class="registration">

                    <form method=post class="registration-form">
                        

                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="txtfname"  placeholder="First name" required>
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="txtlname" placeholder="Last name" required>
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-phone"></i>
                            <input type="text" maxlength="10" pattern="[0-9]{10}" name="txtcontact" placeholder="Contact No." required>
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-person"></i>
                            <div class="input-radio">
                                <input type="radio" name="gender" value="Male" required> Male
                                <input type="radio" name="gender" value="Female" required> Female
                            </div>
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-house"></i>
                            <input type="text" name="address" placeholder="Address" required>
                        </div>
                        
                         <div class="input-field">
                            <i class="fa-solid fa-city"></i>
                            <input type="text" name="state" placeholder="state" required>
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-city"></i>
                            <input type="text" name="city" placeholder="City" required>
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-location-pin"></i>
                            <input type="text" name="pincode" maxlength="6" pattern="[0-9]{6}" placeholder="Pincode" required>
                        </div>

                        <input type="submit" name="btnregister" value="Register" class="btn solid">
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>

<?php
$c = mysqli_connect("localhost", "root", "", "sareeproject") or die(mysqli_connect_error());

if (isset($_POST['btnregister'])) {

    $fname = $_POST['txtfname'];
    $lname = $_POST['txtlname'];
    $contact_no = $_POST['txtcontact'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $sql = "INSERT INTO tbl_registration (fname,lname,contact_no,email,gender,address,city,pincode) VALUES ('$fname','$lname','$contact_no','$email','$gender','$address','$city','$pincode')";

    if (mysqli_query($c, $sql)) {
        echo"<script>alert('inserted');</script>";
    } else {
        echo"error:" . mysqli_error($c);
    }
    ?>
    <script>window.location.href = "http://localhost/PhpProject1/Homepage.php";</script>
    <?php
}
?>

<?php
if (isset($_POST['txtfname'])) {
    $fname = $_POST['txtfname'];
    if (!preg_match("/^[a-zA-Z ]+$/", $fname)) {
        echo "please enter the first name in alphabetic format";
    }
}

if (isset($_POST['txtlname'])) {
    $lname = $_POST['txtlname'];
    if (!preg_match("/^[a-zA-Z ]+$/", $lname)) {
        echo "please enter the last name in alphabetic format";
    }
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (!preg_match("/^[a-zA-Z ]+$/", $email)) {
        echo "please enter the email in alphabetic format";
    }
}

if (isset($_POST['city'])) {
    $city = $_POST['city'];
    if (!preg_match("/^[a-zA-Z ]+$/", $city)) {
        echo "please enter the city in alphabetic format";
    }
}
?>
