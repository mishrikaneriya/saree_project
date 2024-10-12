<?php
require 'config.php'; // Ensure this file connects to your database
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $otp = rand(100000, 999999); // Generate a random OTP
    $is_verified = 0; // Initially set to 0 (not verified)

    // Insert into database
   // Insert into database
$stmt = $conn->prepare("INSERT INTO tbl_user (email, password, otp, is_verified) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssii", $email, $password, $otp, $is_verified);

    if ($stmt->execute()) {
        // Send OTP email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp-brevo.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '7dd053001@smtp-brevo.com';
            $mail->Password   = 'PZEbFxLfmYav8dnI';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('bhargavtz@gtb.org.in', 'bhargavtz');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Verify Your Email';
            $mail->Body    = "Your OTP is <b>$otp</b>";
            
            $mail->send();
            header("Location: verify_otp.php?email=$email");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the statement
}
$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Signup</h2>
        <form action="signup.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.html">Login here</a></p>
    </div>
</body>
</html>
