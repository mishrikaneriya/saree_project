<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    // Verify OTP
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND otp = ?");
    $stmt->bind_param("si", $email, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update user as verified
        $stmt = $conn->prepare("UPDATE users SET is_verified = 1 WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        echo "Your account has been verified. You can now <a href='login.php'>Login</a>.";
    } else {
        echo "Invalid OTP.";
    }
}
?>
<form method="post">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
    <input type="text" name="otp" placeholder="Enter OTP">
    <button type="submit">Verify</button>
</form>
