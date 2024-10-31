<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Basic styling for the navbar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f0f2f5;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #343a40; /* Match sidebar color */
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            color: #fff; /* Text color for navbar */
        }

        .navbar-left a, .navbar-right a {
            text-decoration: none;
            margin: 0 10px;
            color: #fff; /* Change link color */
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar-left a:hover, .navbar-right a:hover {
            color: #007bff;
        }

        .navbar-right img {
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Responsive design for mobile view */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .navbar-left, .navbar-right {
                display: flex;
                flex-direction: column;
                width: 100%;
                align-items: flex-start;
            }
            .navbar-left a, .navbar-right a {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <a href="Homepage.php">Home</a>
            <a href="vieworder.php">Orders</a>
            <a href="viewcustomer.php">Customers</a>
        </div>
        <div class="navbar-right">
            <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Profile Image" width="30" height="30">
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
