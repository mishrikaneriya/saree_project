<?php
session_start();
require 'config.php'; // Include your configuration file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from tbl_user
    $stmt = $con->prepare("SELECT * FROM tbl_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            if ($user['is_verified'] == 1) {
                // Set session variables
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_email'] = $user['email'];
                header("Location: user_dashboard.php"); // Redirect to user dashboard
                exit();
            } else {
                $error_message = "Please verify your email before logging in.";
            }
        } else {
            $error_message = "Incorrect password.";
        }
    } else {
        $error_message = "User does not exist.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
        <p>Forgot your password? <a href="forgotpasslink.php">Reset here</a></p>
    </div>
</body>
</html>
