<?php
session_start();
require 'config.php'; // Include your configuration file

$error_message = ""; // Initialize the error message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_admin_login = false; // Flag to check if it's admin login

    // First, check if the login is for an admin
    $stmt = $con->prepare("SELECT * FROM admin_users WHERE username = ?"); // Change "username" as necessary
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Admin user found
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            // Admin login successful
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: admin_dashboard.php"); // Redirect to admin dashboard
            exit();
        } else {
            $error_message = "Incorrect password for admin.";
        }
        $is_admin_login = true; // Set the flag as true for admin login
    }

    // If not an admin, check if it's a regular user
    if (!$is_admin_login) {
        $stmt = $con->prepare("SELECT * FROM tbl_user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // User login successful
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_email'] = $user['email'];
                header("Location: user_dashboard.php"); // Redirect to user dashboard
                exit();
            } else {
                $error_message = "Incorrect password for user.";
            }
        } else {
            $error_message = "User does not exist.";
        }
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
                <label for="email">Email/Username:</label>
                <input type="text" name="email" required>
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
