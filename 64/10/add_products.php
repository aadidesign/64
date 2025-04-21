<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO products (name, price, stock) VALUES ('$name', '$price', '$stock')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add a New Product</h1>
    <form method="POST">
        <label for="name">Product Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label for="price">Price:</label><br>
        <input type="text" name="price" required><br><br>

        <label for="stock">Stock Quantity:</label><br>
        <input type="number" name="stock" required><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
