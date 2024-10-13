<?php
include("config.php");
session_start();

if (isset($_POST['verify_otp'])) {
    $email = $_GET['email'];
    $otp = $_POST['otp'];

    $query = "SELECT * FROM `registered_users` WHERE `email`=? AND `verification_code`=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $email, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $update_query = "UPDATE `registered_users` SET `is_verified`=1 WHERE `email`=?";
        $stmt = $con->prepare($update_query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        echo "<script>alert('OTP verified! You can now log in.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid OTP'); window.location.href='otp_verification.php?email=" . urlencode($email) . "';</script>";
    }
}
?>
