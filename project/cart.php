<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - Saree Selling Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body
         {
            background: #f8f9fa;
        }
        .cart-container {
            margin-top: 20px;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        .total {
            font-weight: bold;
            font-size: 1.5em;
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
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                <li class="nav-item active"><a class="nav-link" href="cart.php">Cart</a></li>
            </ul>
        </div>
    </nav>

    <div class="cart-container">
        <h2>Your Cart</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price (INR)</th>
                    <th>Quantity</th>
                    <th>Total (INR)</th>
                </tr>
            </thead>
            <tbody id="cartItems">
                <!-- Cart items will be dynamically inserted here -->
                <tr>
                    <td>Saree Example 1</td>
                    <td>2000</td>
                    <td><input type="number" value="1" min="1" class="form-control quantity" onchange="updateTotal()"></td>
                    <td class="itemTotal">2000</td>
                </tr>
                <tr>
                    <td>Saree Example 2</td>
                    <td>1500</td>
                    <td><input type="number" value="1" min="1" class="form-control quantity" onchange="updateTotal()"></td>
                    <td class="itemTotal">1500</td>
                </tr>
                <!-- Add more items as needed -->
            </tbody>
        </table>

        <div class="total">Total Amount: <span id="totalAmount">3500</span> INR</div>
        <button class="btn btn-primary mt-3" onclick="proceedToPayment()">Proceed to Payment</button>
    </div>

    <footer class="text-center mt-4">
        <p>&copy; <?php echo date("Y"); ?> Saree Selling Website</p>
    </footer>

    <script>
        function updateTotal() {
            const rows = document.querySelectorAll('#cartItems tr');
            let total = 0;

            rows.forEach(row => {
                const price = parseFloat(row.cells[1].innerText);
                const quantity = row.querySelector('.quantity').value;
                const itemTotal = price * quantity;
                row.querySelector('.itemTotal').innerText = itemTotal.toFixed(2);
                total += itemTotal;
            });

            document.getElementById('totalAmount').innerText = total.toFixed(2);
        }

        function proceedToPayment() {
            alert("Proceeding to payment. Total Amount: " + document.getElementById('totalAmount').innerText + " INR");
            // Here you can redirect to a payment processing page or further actions
        }
    </script>
</body>
</html>
