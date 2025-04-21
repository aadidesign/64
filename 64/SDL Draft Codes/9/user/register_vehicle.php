<?php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $owner = $_POST['owner_name'];
    $vnum = $_POST['vehicle_number'];
    $vtype = $_POST['vehicle_type'];

    $stmt = $conn->prepare("INSERT INTO vehicles (owner_name, vehicle_number, vehicle_type_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $owner, $vnum, $vtype);
    $stmt->execute();

    echo "Vehicle registered successfully.";
}

$result = $conn->query("SELECT * FROM vehicle_types");
?>

<form method="POST">
    <input type="text" name="owner_name" required placeholder="Owner Name" />
    <input type="text" name="vehicle_number" required placeholder="Vehicle Number" />
    <select name="vehicle_type" required>
        <option disabled selected>Select Vehicle Type</option>
        <?php while($row = $result->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>"><?= $row['type_name'] ?> - ₹<?= $row['toll_charge'] ?></option>
        <?php endwhile; ?>
    </select>
    <button type="submit">Register</button>
</form>
