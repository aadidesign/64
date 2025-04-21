<?php
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vnum = $_POST['vehicle_number'];
    $booth_id = $_POST['booth_id'];

    // Get vehicle & charge
    $vehicle = $conn->query("SELECT v.id, vt.toll_charge FROM vehicles v
        JOIN vehicle_types vt ON v.vehicle_type_id = vt.id
        WHERE v.vehicle_number = '$vnum'")->fetch_assoc();

    if (!$vehicle) {
        echo "Vehicle not found.";
    } else {
        $stmt = $conn->prepare("INSERT INTO toll_records (vehicle_id, booth_id, toll_amount) VALUES (?, ?, ?)");
        $stmt->bind_param("iid", $vehicle['id'], $booth_id, $vehicle['toll_charge']);
        $stmt->execute();

        echo "Toll Recorded. Amount: ₹" . $vehicle['toll_charge'];
    }
}

$booths = $conn->query("SELECT * FROM toll_booths");
?>

<form method="POST">
    <input type="text" name="vehicle_number" required placeholder="Vehicle Number" />
    <select name="booth_id" required>
        <option disabled selected>Select Toll Booth</option>
        <?php while($b = $booths->fetch_assoc()): ?>
            <option value="<?= $b['id'] ?>"><?= $b['booth_name'] ?> - <?= $b['location'] ?></option>
        <?php endwhile; ?>
    </select>
    <button type="submit">Record Toll</button>
</form>
