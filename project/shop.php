<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Saree Selling Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .item-card {
            margin-bottom: 20px;
        }
        .glassmorphism-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body>
    <!-- Navigation Header -->
    <header class="navbar navbar-expand-lg navbar-light glassmorphism-header p-3">
        <a class="navbar-brand" href="index.php">SareeShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Shop Sarees</h2>
        <div class="row" id="product-list">
            <!-- Items will be dynamically loaded here -->
        </div>
    </div>

    <script>
        // Sample product data
        const products = [
            { id: 1, name: "Silk Saree", price: 50, image: "https://asopalav.b-cdn.net/media/wysiwyg/Homepage/2024/saree3.jpg" },
            { id: 2, name: "Cotton Saree", price: 30, image: "https://asopalav.b-cdn.net/media/wysiwyg/Homepage/2024/skd3.jpg" },
            { id: 3, name: "Designer Saree", price: 100, image: "https://asopalav.b-cdn.net/media/catalog/product/c/c/ccfj1652a-creme-crepe-silk-pleated-resham-embroidered-crop-top-lehenga-with-jacket.jpg" },
            { id: 4, name: "Bridal Saree", price: 150, image: "https://asopalav.b-cdn.net/media/catalog/product/cache/105f7cd698c40f8c8cb493800ea1f5ad/p/s/psafa1070a-maroon-art-silk-kalamkari-printed-saree-with-paisley-motifs.jpg" }
        ];

        // Functions to handle wishlist and cart
        function addToWishlist(id) {
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            if (!wishlist.includes(id)) {
                wishlist.push(id);
                localStorage.setItem('wishlist', JSON.stringify(wishlist));
                alert("Item added to wishlist!");
            } else {
                alert("Item already in wishlist.");
            }
        }

        function addToCart(id) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (!cart.includes(id)) {
                cart.push(id);
                localStorage.setItem('cart', JSON.stringify(cart));
                alert("Item added to cart!");
            } else {
                alert("Item already in cart.");
            }
        }

        // Render products
        function renderProducts() {
            const productList = document.getElementById('product-list');
            productList.innerHTML = '';
            products.forEach(product => {
                productList.innerHTML += `
                    <div class="col-md-3 item-card">
                        <div class="card">
                            <img src="${product.image}" class="card-img-top" alt="${product.name}">
                            <div class="card-body">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">$${product.price}</p>
                                <button class="btn btn-primary w-100" onclick="addToCart(${product.id})">Add to Cart</button>
                                <button class="btn btn-secondary w-100 mt-2" onclick="addToWishlist(${product.id})">Add to Wishlist</button>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', renderProducts);
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
