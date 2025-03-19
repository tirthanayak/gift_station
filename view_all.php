<?php
require 'db.php';
session_start();

$categoryId = $_GET['category'];
$categoryQuery = "SELECT name FROM categories WHERE id = $categoryId";
$categoryResult = $conn->query($categoryQuery);
$categoryName = $categoryResult->fetch_assoc()['name'];

$productsQuery = "SELECT * FROM products WHERE category_id = $categoryId";
$productsResult = $conn->query($productsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $categoryName; ?> - The Gift Station</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-4"><?= $categoryName; ?></h2>
    <div class="row">
        <?php while ($product = $productsResult->fetch_assoc()): ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="images/<?= $product['image']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5><?= $product['name']; ?></h5>
                        <p>₹<?= $product['price']; ?></p>
                        <a href="product.php?id=<?= $product['id']; ?>" class="btn btn-success">Add to cart</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>
