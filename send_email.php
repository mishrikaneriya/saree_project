<?php
include 'phpmailer.php';

require 'send_email.php';
$otp = rand(100000, 999999); // Example OTP generation
sendMail($email, $otp);

if (isset($_POST['email'])) {
    $to = $_POST['email'];
    $subject = 'Registration Successful';
    $body = '<h1>Welcome to Saree Selling System</h1><p>Your registration was successful.</p>';

    if (sendEmail($to, $subject, $body)) {
        echo 'Email sent successfully';
    } else {
        echo 'Failed to send email';
    }
}
?>
