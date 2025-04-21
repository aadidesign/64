<?php
session_start();
include('db.php');

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $total_price = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'];
    }

    // Insert order into database
    $sql = "INSERT INTO orders (product_id, quantity, total) VALUES ";
    foreach ($_SESSION['cart'] as $item) {
        $sql .= "(" . $item['id'] . ", 1, " . $item['price'] . "), ";
    }
    $sql = rtrim($sql, ", ");
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Order placed successfully!</h1>";
        unset($_SESSION['cart']); // Clear the cart after order
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "<h1>Your cart is empty!</h1>";
}
?>
