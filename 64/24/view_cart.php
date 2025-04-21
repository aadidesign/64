<?php
session_start();
include('db.php');

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $total_price = 0;
    echo "<h1>Your Cart</h1>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<div>";
        echo "<h3>" . $item['name'] . "</h3>";
        echo "<p>Price: $" . $item['price'] . "</p>";
        $total_price += $item['price'];
        echo "</div>";
    }
    echo "<p>Total: $" . $total_price . "</p>";
    echo "<a href='checkout.php'>Proceed to Checkout</a>";
} else {
    echo "<h1>Your cart is empty!</h1>";
}
?>
