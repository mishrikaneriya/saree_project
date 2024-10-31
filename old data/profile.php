<?php
include 'header.php';

// Start session and check if the user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Assuming the user ID is stored in the session
$userId = $_SESSION['user_id'];

// Fetch current profile picture from the database (optional)
// Example query: SELECT profile_image FROM users WHERE user_id = $userId;
// $profileImage = fetch from database...

// Handle form submission for updating the profile picture
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_image'])) {
    $targetDir = "uploads/"; // Directory to store uploaded images
    $targetFile = $targetDir . basename($_FILES['profile_image']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES['profile_image']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (e.g., max 2MB)
    if ($_FILES['profile_image']['size'] > 2097152) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (jpg, png, jpeg, gif)
    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) {
            // Update profile image in the database
            // Example query: UPDATE users SET profile_image = '$targetFile' WHERE user_id = $userId;

            echo "The file " . htmlspecialchars(basename($_FILES['profile_image']['name'])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<h2>User Profile</h2>
<form action="profile.php" method="post" enctype="multipart/form-data">
    <label for="profile_image">Upload Profile Picture:</label>
    <input type="file" name="profile_image" id="profile_image">
    <button type="submit">Upload Image</button>
</form>

<!-- Display the current profile picture -->
<?php if (!empty($profileImage)): ?>
    <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Profile Image" width="150" height="150">
<?php endif; ?>
