<?php
session_start();
require 'config.php'; // Include your configuration file
require 'vendor/autoload.php'; // Include Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password

    // Insert user into database
    $stmt = $con->prepare("INSERT INTO tbl_user (email, password, is_verified) VALUES (?, ?, 1)");
    $stmt->bind_param("ss", $email, $password);
    
    if ($stmt->execute()) {
        // Send confirmation email
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'bhargavthummar05@gmail.com'; // Your SMTP username
            $mail->Password = 'qjtd wfdi zpmo xwzr'; // Your SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom('22bmiit155@gmail.com', 'bhargavtz');
            $mail->addAddress($email); // Add recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Registration Confirmation';
            $mail->Body    = 'Thank you for registering! You can now log in with your credentials.';

            $mail->send();
            echo 'Registration successful! A confirmation email has been sent.';
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Registration failed: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
