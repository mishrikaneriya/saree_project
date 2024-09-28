<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, rgba(0, 128, 255, 0.5), rgba(0, 210, 255, 0.3)), url('background.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper {
            display: flex;
            width: 90%;
            max-width: 1200px;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: rgba(52, 58, 64, 0.75);
            backdrop-filter: blur(10px);
            color: #fff;
            position: fixed;
            border-radius: 10px;
            padding-top: 20px;
        }

        .sidebar-header {
            text-align: center;
            padding: 15px;
            font-size: 1.5rem;
            font-weight: bold;
            background: rgba(108, 117, 125, 0.8);
            backdrop-filter: blur(5px);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding-right: 10px;
        }

        .sidebar ul li {
            padding: 15px;
            text-transform: uppercase;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .sidebar ul li:hover {
            background-color: rgba(0, 123, 255, 0.3);
            cursor: pointer;
            border-radius: 5px;
            padding-left: 25px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
            width: 100%;
            color: #333;
            position: relative;
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            border-radius: 10px;
            min-height: 90vh;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
        }

        header h2 {
            font-size: 2rem;
            color: #007bff;
        }

        .cards {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .card {
            background: rgba(23, 162, 184, 0.75);
            color: white;
            padding: 20px;
            width: 200px;
            text-align: center;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card.green {
            background: rgba(40, 167, 69, 0.75);
        }

        .card.yellow {
            background: rgba(255, 193, 7, 0.75);
        }

        .card.red {
            background: rgba(220, 53, 69, 0.75);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .card-detail {
            margin-top: 10px;
        }

        .card-detail a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .card-detail a:hover {
            text-decoration: underline;
        }

        .new-orders {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            overflow: hidden;
            backdrop-filter: blur(5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #007bff;
            color: white;
        }

        th, td {
            padding: 15px;
            border: 1px solid rgba(0, 123, 255, 0.1);
        }

        /* Add some JS-triggered effect (optional) */
        .sidebar ul li a:active {
            transform: translateX(10px);
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
        </div>
        <ul class="list-unstyled components">
            <li><a href="Admin_Dashboard.php">Home</a></li>
            <li><a href="viewcustomer.php">View customer details</a></li>
            <li><a href="manageproduct.php">Manage products</a></li>
            <li><a href="vieworder.php">View order details</a></li>
            <li><a href="viewcancel.php">View cancel orders</a></li>
            <li><a href="viewreview.php">View Review</a></li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div class="content">
        <header>
            <h2>Home</h2>
        </header>

        <div class="cards">
            <div class="card">
                <div class="card-title">6 Products</div>
                <div class="card-detail"><a href="#">View Details</a></div>
            </div>
            <div class="card green">
                <div class="card-title">0 Customers</div>
                <div class="card-detail"><a href="#">View Details</a></div>
            </div>

            <div class="card red">
                <div class="card-title">44 Orders</div>
                <div class="card-detail"><a href="#">View Details</a></div>
            </div>
        </div>

        <div class="new-orders">
            <h3>New Orders</h3>
            <table>
                <thead>
                <tr>
                    <th>Order No</th>
                    <th>Customer Email</th>
                    <th>Invoice No</th>
                    <th>Product Id</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="7">No orders available</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
