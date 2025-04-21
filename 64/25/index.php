<?php
include('db.php');

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

echo "<h1>Our Products</h1>";
while($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . $row['name'] . "</h3>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p>Price: $" . $row['price'] . "</p>";
    echo "<a href='add_to_cart.php?id=" . $row['id'] . "'>Add to Cart</a>";
    echo "</div>";
}
?>
