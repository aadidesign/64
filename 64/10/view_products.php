<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Get product price
    $sql = "SELECT price, stock FROM products WHERE id = $product_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $price = $row['price'];
    $stock = $row['stock'];

    if ($quantity > $stock) {
        echo "Not enough stock available.";
    } else {
        $total_amount = $price * $quantity;

        // Record sale
        $sql = "INSERT INTO sales (product_id, quantity, total_amount) VALUES ('$product_id', '$quantity', '$total_amount')";

        if ($conn->query($sql) === TRUE) {
            echo "Sale recorded successfully!";

            // Update product stock
            $new_stock = $stock - $quantity;
            $sql = "UPDATE products SET stock = $new_stock WHERE id = $product_id";
            $conn->query($sql);
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Sale</title>
</head>
<body>
    <h1>Record a Sale</h1>
    <form method="POST">
        <label for="product_id">Product ID:</label><br>
        <input type="number" name="product_id" required><br><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" required><br><br>

        <button type="submit">Record Sale</button>
    </form>
</body>
</html>
