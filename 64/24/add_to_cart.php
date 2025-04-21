<?php
session_start();
include('db.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Get product details
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
    
    // Add product to session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $product;

    echo "Product added to cart. <a href='view_cart.php'>View Cart</a> | <a href='index.php'>Continue Shopping</a>";
}
?>
