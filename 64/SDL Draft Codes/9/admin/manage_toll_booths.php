<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['booth_name'];
    $loc = $_POST['location'];
    $conn->query("INSERT INTO toll_booths (booth_name, location) VALUES ('$name', '$loc')");
}

$booths = $conn->query("SELECT * FROM toll_booths");
?>

<form method="POST">
    <input type="text" name="booth_name" placeholder="Booth Name" required>
    <input type="text" name="location" placeholder="Location" required>
    <button type="submit">Add Booth</button>
</form>

<h3>Existing Toll Booths</h3>
<ul>
<?php while($b = $booths->fetch_assoc()): ?>
    <li><?= $b['booth_name'] ?> - <?= $b['location'] ?></li>
<?php endwhile; ?>
</ul>
