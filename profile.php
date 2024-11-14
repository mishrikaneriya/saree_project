<?php
// Start the session
session_start();

// Include the database connection
include('config.php'); // Ensure this points to your actual database config file

// Check if the user is logged in (i.e., user_id exists in session)
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: index.php');
    exit();
}

// Get user data from the database
$user_id = $_SESSION['user_id']; // The logged-in user’s ID is stored in session
$query = $conn->prepare("SELECT * FROM tbl_users WHERE user_id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();

// Check if user data is returned
if ($result->num_rows == 0) {
    // Redirect to login page if no data is found for the user
    header('Location: index.php');
    exit();
}

$user = $result->fetch_assoc();

// Handle the profile update form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Update user profile in the database
    $update_query = $conn->prepare("UPDATE tbl_users SET first_name = ?, last_name = ?, email = ?, phone = ?, address = ? WHERE user_id = ?");
    $update_query->bind_param("sssssi", $first_name, $last_name, $email, $phone, $address, $user_id);

    if ($update_query->execute()) {
        $message = "Profile updated successfully!";
    } else {
        $message = "Error updating profile. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-6 bg-white rounded shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-6">User Profile</h2>
        
        <!-- Display success or error message -->
        <?php if (isset($message)) : ?>
            <div class="text-center text-lg <?php echo (strpos($message, 'success') !== false) ? 'text-green-500' : 'text-red-500'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="profile.php" method="POST" class="space-y-4">
            <!-- First Name -->
            <div class="flex flex-col">
                <label for="first_name" class="font-medium text-lg">First Name</label>
                <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" class="p-2 border rounded mt-1">
            </div>

            <!-- Last Name -->
            <div class="flex flex-col">
                <label for="last_name" class="font-medium text-lg">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" class="p-2 border rounded mt-1">
            </div>

            <!-- Email -->
            <div class="flex flex-col">
                <label for="email" class="font-medium text-lg">Email</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="p-2 border rounded mt-1">
            </div>

            <!-- Phone -->
            <div class="flex flex-col">
                <label for="phone" class="font-medium text-lg">Phone</label>
                <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" class="p-2 border rounded mt-1">
            </div>

            <!-- Address -->
            <div class="flex flex-col">
                <label for="address" class="font-medium text-lg">Address</label>
                <textarea name="address" id="address" rows="4" class="p-2 border rounded mt-1"><?php echo htmlspecialchars($user['address']); ?></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update Profile</button>
            </div>
        </form>
    </div>
</body>
</html>
