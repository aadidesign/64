<?php
include('../includes/db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
    $qty = $_POST['quantity'];
    $price = $_POST['price'];
    $expiry = $_POST['expiry_date'];

    $stmt = $conn->prepare("INSERT INTO medicines (name, category_id, supplier_id, quantity, price, expiry_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiids", $name, $category, $supplier, $qty, $price, $expiry);
    $stmt->execute();

    echo "Medicine Added Successfully!";
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Medicine Name" required />
    <input type="number" name="category" placeholder="Category ID" required />
    <input type="number" name="supplier" placeholder="Supplier ID" required />
    <input type="number" name="quantity" placeholder="Quantity" required />
    <input type="text" name="price" placeholder="Price" required />
    <input type="date" name="expiry_date" required />
    <button type="submit">Add Medicine</button>
</form>