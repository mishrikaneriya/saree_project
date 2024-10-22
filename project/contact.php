<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Saree Selling Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .contact-container {
            margin-top: 20px;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body>
    <!-- Header with Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Saree Shop</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                <li class="nav-item active"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
            </ul>
        </div>
    </nav>

    <div class="contact-container">
        <h2>Contact Us</h2>
        <p>If you have any questions, comments, or suggestions, feel free to reach out to us using the form below:</p>
        
        <form id="contactForm">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="whatsapp">WhatsApp Number</label>
                <input type="text" class="form-control" id="whatsapp" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="successMessage" style="display: none; margin-top: 20px;">
            <p class="alert alert-success">Thank you for contacting us! We will get back to you soon.</p>
        </div>
    </div>

    <footer class="text-center mt-4">
        <p>&copy; <?php echo date("Y"); ?> Saree Selling Website</p>
    </footer>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('successMessage').style.display = 'block';
            this.reset(); // Clear the form after submission
        });
    </script>
</body>
</html>
