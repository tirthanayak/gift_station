<?php
session_start();
include 'db.php';


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    $product_id = $_POST["product_id"];

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }

    header("Location: cart.php");
    exit();
}

if (isset($_GET["remove"])) {
    $product_id = $_GET["remove"];
    unset($_SESSION['cart'][$product_id]);
    header("Location: cart.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_cart"])) {
    foreach ($_POST['quantity'] as $product_id => $qty) {
        if ($qty > 0) {
            $_SESSION['cart'][$product_id] = $qty;
        } else {
            unset($_SESSION['cart'][$product_id]);
        }
    }
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | The Gift Station</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">🎁 The Gift Station</a>
        <a class="btn btn-outline-light" href="products.php">🛍 Continue Shopping</a>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center">🛒 Your Shopping Cart</h2>

    <?php if (empty($_SESSION['cart'])): ?>
        <p class="text-center">Your cart is empty! <a href="products.php">Shop Now</a></p>
    <?php else: ?>
        <form method="post">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = 0;
                    foreach ($_SESSION['cart'] as $product_id => $quantity):
                        $product_result = mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id");
                        $product = mysqli_fetch_assoc($product_result);
                        $subtotal = $product['price'] * $quantity;
                        $total_price += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo $product['name']; ?></td>
                        <td>$<?php echo number_format($product['price'], 2); ?></td>
                        <td>
                            <input type="number" name="quantity[<?php echo $product_id; ?>]" value="<?php echo $quantity; ?>" min="1">
                        </td>
                        <td>$<?php echo number_format($subtotal, 2); ?></td>
                        <td>
                            <a href="cart.php?remove=<?php echo $product_id; ?>" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h4 class="text-end">Total: $<?php echo number_format($total_price, 2); ?></h4>

            <div class="text-end">
                <!-- <button type="submit" name="update_cart" class="btn btn-warning">Update Cart</button> -->
                <a href="checkout.php" class="btn btn-primary">Checkout</a>
            </div>
        </form>
    <?php endif; ?>
</div>

<div class="footer bg-dark text-center text-white py-3">
    <p>© 2024 The Gift Station. All rights reserved.</p>
</div>

</body>
</html>
