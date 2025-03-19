<?php
require 'db.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | The Gift Station</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f8f9fa; }
        .navbar { background: #2ebf91; padding: 15px; }
        .navbar-brand { font-size: 26px; font-weight: bold; color: white !important; }
        .section { padding: 60px 0; }
        .highlight { color: #2ebf91; font-weight: bold; }
        .about-container { max-width: 1100px; margin: auto; background: white; padding: 50px; border-radius: 15px; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1); }
        .about-image { width: 100%; border-radius: 10px; }
        .vision-mission { background: #e9f5f0; padding: 50px; border-radius: 15px; }
        .testimonial { background: white; padding: 40px; border-radius: 15px; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1); }
        .testimonial img { width: 60px; border-radius: 50%; margin-right: 15px; }
        .footer { background: #2ebf91; color: white; text-align: center; padding: 20px; margin-top: 40px; }
    </style>
</head>
<body>

<!-- Navbar -->
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

<!-- Hero Section -->
<div class="container section">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2>📖 Welcome to <span class="highlight">The Gift Station</span></h2>
            <p>
                Gifting is an expression of love, and at <span class="highlight">The Gift Station</span>, we make it special for you. 
                From customized presents to handpicked selections, we help you create memories that last a lifetime.
            </p>
        </div>
        <div class="col-md-6">
            <img src="images/IMG-20241231-WA0035.jpg" alt="About Us" class="about-image">
        </div>
    </div>
</div>

<!-- Our Story -->
<div class="container section">
    <div class="about-container">
        <h3 class="text-center">✨ Our Story</h3>
        <p>
            <span class="highlight">The Gift Station</span> started with a simple idea – to make gift-giving **effortless, personal, and memorable**. 
            What began as a small passion project has now grown into a global brand, delivering thousands of smiles worldwide.
        </p>
        <p>
            Our expert team carefully selects **high-quality, meaningful gifts** for every occasion – birthdays, anniversaries, weddings, and more. 
            We focus on **personalization, affordability, and fast delivery** to make sure your special moments remain unforgettable.
        </p>
    </div>
</div>

<!-- Mission & Vision -->
<div class="container section">
    <div class="vision-mission text-center">
        <h3>🎯 Our Mission</h3>
        <p>
            To help people express their emotions through meaningful and unique gifts, ensuring **happiness and joy** with every purchase.
        </p>

        <h3 class="mt-4">🌟 Our Vision</h3>
        <p>
            We aim to become the world's most **trusted gifting platform**, making thoughtful gifting accessible to everyone, everywhere.
        </p>
    </div>
</div>

<!-- Why Choose Us -->
<div class="container section">
    <div class="about-container">
        <h3 class="text-center">💡 Why Choose <span class="highlight">Us?</span></h3>
        <ul>
            <li>🌟 **Handpicked & High-Quality Gifts** – Only the best selections for every occasion.</li>
            <li>🎁 **Personalized Options** – Engraving, custom messages, and more.</li>
            <li>🚚 **Worldwide Delivery** – We deliver happiness globally!</li>
            <li>💯 **100% Customer Satisfaction** – Our customers love us, and you will too!</li>
        </ul>
    </div>
</div>

<!-- Customer Testimonials -->
<div class="container section">
    <h3 class="text-center">🗣️ What Our Customers Say</h3>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="testimonial d-flex align-items-center">
                <img src="images/customer1.jpg" alt="Customer">
                <p>"Absolutely love their collection! Fast delivery and great quality." – <b>Emily R.</b></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial d-flex align-items-center">
                <img src="images/customer2.jpg" alt="Customer">
                <p>"My custom gift was perfect. Amazing service!" – <b>Michael B.</b></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial d-flex align-items-center">
                <img src="images/customer3.jpg" alt="Customer">
                <p>"Best place to find unique gifts. Highly recommended!" – <b>Sophia W.</b></p>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div class="container text-center section">
    <h3>📞 Get In Touch</h3>
    <p>
        Need assistance? Our friendly team is here to help.  
        Reach out via our <a href="contact.php" class="text-decoration-none text-success">Contact Page</a> or connect with us on social media.
    </p>
    <a href="products.php" class="btn btn-success btn-lg">🎁 Explore Our Collection</a>
</div>

<!-- Footer -->
<div class="footer">
    <p>© 2024 The Gift Station. All rights reserved.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
