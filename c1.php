<?php
session_start(); 
@include 'config.php';// Check connectionphp


// Add a product to the cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Check if the product exists in the database
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // If the product already exists in the cart, update the quantity
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }
}

// Remove a product from the cart
if (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];

    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$products = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[$row['id']] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Products</h1>
    <?php foreach ($products as $product): ?>
        <div>
            <h3><?php echo $product['name']; ?></h3>
            <p>Price: $<?php echo $product['price']; ?></p>
            <form method="post" action="">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" value="1" min="1">
                <input type="submit" name="add_to_cart" value="Add to Cart">
            </form>
        </div>
    <?php endforeach; ?>

    <h1>Cart</h1>
    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <?php foreach ($_SESSION['cart'] as $product_id => $quantity): ?>
            <?php $product = $products[$product_id]; ?>
            <div>
                <h3><?php echo $product['name']; ?></h3>
                <p>Price: $<?php echo $product['price']; ?></p>
                <p>Quantity: <?php echo $quantity; ?></p>
                <form method="post" action="">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <input type="submit" name="remove_from_cart" value="Remove from Cart">
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

    <?php
    // Close database connection
    $conn->close();
    ?>
</body>
</html>
