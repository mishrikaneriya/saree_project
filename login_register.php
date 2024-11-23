<?php
include("config.php");
session_start();

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to generate OTP
function generate_otp() {
    return rand(100000, 999999);
}

// Function to send OTP email
function sendMail($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dharmikdonda2206@gmail.com'; // Change to your email
        $mail->Password = 'mrbg hyyu lnvc uaqm'; // Change to your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('22bmmit171@gmail.com', 'mahek pagal');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email verification';
        $mail->Body = "Thanks for registering. Your OTP is: <b>$otp</b>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Login Logic
if (isset($_POST['login'])) {
    $query = "SELECT * FROM `registered_users` WHERE `email`=? OR `username`=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $_POST['email_username'], $_POST['email_username']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if ($user['is_verified'] == 1) {
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                header("location: index.php");
            } else {
                echo "<script>alert('Incorrect password'); window.location.href='index.php';</script>";
            }
        } else {
            echo "<script>alert('Email not verified'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Email or username not registered'); window.location.href='index.php';</script>";
    }
}

// Registration Logic
if (isset($_POST['register'])) {
    $user_exist_query = "SELECT * FROM `registered_users` WHERE `username`=? OR `email`=?";
    $stmt = $con->prepare($user_exist_query);
    $stmt->bind_param(types: "ss", $_POST['username'], $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $existing_user = $result->fetch_assoc();
        if ($existing_user['username'] === $_POST['username']) {
            echo "<script>alert('Username already taken'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Email already registered'); window.location.href='index.php';</script>";
        }
    } else {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $otp = generate_otp();
        $query = "INSERT INTO `registered_users` (`full_name`, `username`, `email`, `password`, `verification_code`, `is_verified`) VALUES (?, ?, ?, ?, ?, 0)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssss", $_POST['fullname'], $_POST['username'], $_POST['email'], $password, $otp);

        if ($stmt->execute() && sendMail($_POST['email'], $otp)) {
            header("Location: otp_verification.php?email=" . urlencode($_POST['email']));
        } else {
            echo "<script>alert('Server error'); window.location.href='index.php';</script>";
        }
    }
}
?>
