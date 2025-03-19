<?php
require 'db.php';
session_start();

$categoriesQuery = "SELECT * FROM categories";
$categoriesResult = $conn->query($categoriesQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gift Station | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background: #2ebf91;
        }

        .category-section {
            padding: 40px 0;
        }

        .category-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .view-all {
            float: right;
            font-size: 16px;
            color: #2ebf91;
            text-decoration: none;
        }

        .product-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">🎁 The Gift Station</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index_main.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <?php if (isset($_SESSION["user_id"])): ?>
                    <li class="nav-item"><a class="nav-link btn btn-cart" href="cart.php">🛒 Cart</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>


<div id="giftCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#giftCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#giftCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#giftCarousel" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#giftCarousel" data-bs-slide-to="3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/slider1.jpg" class="d-block w-100" alt="Gift Image 1">
        </div>
        <div class="carousel-item">
            <img src="images/slider2.jpg" class="d-block w-100" alt="Gift Image 2">
        </div>
        <div class="carousel-item">
            <img src="images/slider3.jpg" class="d-block w-100" alt="Gift Image 3">
        </div>
        <div class="carousel-item">
            <img src="images/slider4.jpg" class="d-block w-100" alt="Gift Image 4">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#giftCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#giftCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

<div class="container category-section">
    <?php while ($category = $categoriesResult->fetch_assoc()): ?>
        <div class="mb-4">
            <h2 class="category-title">
                <?= $category['name']; ?>
                <a href="view_all.php?category=<?= $category['id']; ?>" class="view-all">View All</a>
            </h2>
            <div class="row">
                <?php
                $categoryId = $category['id'];
                $subcategoriesQuery = "SELECT * FROM products WHERE category_id = $categoryId LIMIT 4";
                $subcategoriesResult = $conn->query($subcategoriesQuery);
                while ($product = $subcategoriesResult->fetch_assoc()):
                ?>
                    <div class="col-md-3">
                        <div class="card product-card">
                            <img src="images/<?= $product['image']; ?>" class="card-img-top" alt="<?= $product['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['name']; ?></h5>
                                <!-- <p class="card-text">₹<?= $product['price']; ?></p> -->
                                <!-- <a href="product.php?id=<?= $product['id']; ?>" class="btn btn-success">Add to cart </a> -->
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<div class="footer bg-success text-white text-center py-3 mt-4">
    <p>© 2024 The Gift Station. All rights reserved.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
