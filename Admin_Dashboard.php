<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="your-style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
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
    width: calc(100% - 270px);
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
    font-size: 2.5rem;
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

@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .sidebar ul {
        display: none;
    }

    .sidebar-header {
        display: block;
        width: 100%;
        text-align: left;
        font-size: 1.2rem;
    }

    .toggle-sidebar {
        display: block;
        font-size: 1.2rem;
        padding: 10px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        text-align: center;
    }

    .content {
        margin-left: 0;
        width: 100%;
    }
}

/* Show the sidebar when the toggle button is clicked */
.toggle-sidebar.active + .sidebar ul {
    display: block;
}

.sidebar ul li a:active {
    transform: translateX(10px);
}
</style>
<body>

<div class="wrapper">
    <nav class="sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
        </div>
        <ul class="list-unstyled components">
            <li><a href="Admin_Dashboard.php">Homes</a></li>
            <li><a href="viewcustomer.php">View customer details</a></li>
            <li><a href="manageproduct.php">Manage products</a></li>
            <li><a href="vieworder.php">View order details</a></li>
            <li><a href="viewcancel.php">View cancel orders</a></li>
            <li><a href="viewreview.php">View Review</a></li>
        </ul>
    </nav>

    <div id="loading" style="display:none;">Loading...</div>
    <div class="content">
        <header>
            <h2>Home</h2>
        </header>
        <p>Welcome to the Admin Panel</p>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.toggle-sidebar').on('click', function() {
            $(this).toggleClass('active');
            $('.sidebar ul').toggle();
        });

        $('.sidebar ul li a').on('click', function(event) {
            event.preventDefault();
            var pageUrl = $(this).attr('href');

            $.ajax({
                url: pageUrl,
                type: 'GET',
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(data) {
                    $('.content').html(data);
                },
                complete: function() {
                    $('#loading').hide();
                },
                error: function() {
                    alert('Failed to load page');
                }
            });
        });
    });
</script>

</body>
</html>
