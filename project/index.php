<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saree Selling Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
 @import url('https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap');

        /* Custom Styling */
        .glassmorphism, .glassmorphism-footer {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .glassmorphism-header{
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            /* border-radius: 15px; */
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-nav .nav-link {
            font-size: 1.1rem;
        }
        .btn-outline-light {
            border-color: white;
            color: white;
        }
        .btn-outline-light:hover {
            background-color: white;
            color: black;
        }
        .container h2 {
            font-weight: bold;
        }
        .footer-links h5 {
            font-weight: bold;
            font-size: 1.2rem;
        }
        .footer-links a {
            text-decoration: none;
            color: #f8f9fa;
        }
        .footer-links a:hover {
            color: #ffc107;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-expand-lg glassmorphism-header p-3">
        <a class="navbar-brand" href="index.php">SareeShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="btn btn-outline-light" href="login.php">Login</a></li>
            </ul>
        </div>
    </header>

    <div class="container mt-4">
        <div class="input-group mb-3 glassmorphism p-3">
            <input type="text" class="form-control" placeholder="Search for sarees, collections..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">Search</button>
            </div>
        </div>
    </div>

    

    <!-- Top Categories -->
    <section class="container mt-5 glassmorphism p-4">
        <h2 class="text-center">Top Categories</h2>
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <img src="https://asopalav.b-cdn.net/media/wysiwyg/Homepage/2024/saree3.jpg" class="img-fluid" alt="Silk Sarees">
                <p>Silk Sarees</p>
            </div>
            <div class="col-md-3 mb-4">
                <img src="https://asopalav.b-cdn.net/media/wysiwyg/Homepage/2024/skd3.jpg" class="img-fluid" alt="Cotton Sarees">
                <p>Cotton Sarees</p>
            </div>
            <div class="col-md-3 mb-4">
                <img src="https://asopalav.b-cdn.net/media/catalog/product/c/c/ccfj1652a-creme-crepe-silk-pleated-resham-embroidered-crop-top-lehenga-with-jacket.jpg" class="img-fluid" alt="Designer Sarees">
                <p>Designer Sarees</p>
            </div>
            <div class="col-md-3 mb-4">
                <img src="https://asopalav.b-cdn.net/media/catalog/product/cache/105f7cd698c40f8c8cb493800ea1f5ad/p/s/psafa1070a-maroon-art-silk-kalamkari-printed-saree-with-paisley-motifs.jpg" class="img-fluid" alt="Bridal Sarees">
                <p>Bridal Sarees</p>
            </div>
        </div>
    </section>

    <!-- Wedding Couture -->
    <section class="container mt-5 glassmorphism p-4">
        <h2 class="text-center">Wedding Couture</h2>
        <p class="text-center">Experience the elegance and charm of traditional wedding sarees. Our collection features a wide range of intricately designed bridal sarees, crafted with the finest fabrics and adorned with beautiful embellishments to make your special day unforgettable.</p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <img src="https://asopalav.b-cdn.net/media/wysiwyg/Homepage/2024/saree3.jpg" class="img-fluid" alt="Wedding 1">
            </div>
            <div class="col-md-4 mb-4">
                <img src="https://asopalav.b-cdn.net/media/wysiwyg/Homepage/2024/skd3.jpg" class="img-fluid" alt="Wedding 2">
            </div>
            <div class="col-md-4 mb-4">
                <img src="https://asopalav.b-cdn.net/media/catalog/product/cache/105f7cd698c40f8c8cb493800ea1f5ad/p/s/psafa1070a-maroon-art-silk-kalamkari-printed-saree-with-paisley-motifs.jpg" class="img-fluid" alt="Wedding 3">
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
