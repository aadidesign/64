<?php
include('../includes/db.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<h2>Admin Dashboard</h2>
<?php
$total_meds = $conn->query("SELECT COUNT(*) AS count FROM medicines")->fetch_assoc()['count'];
$total_sales = $conn->query("SELECT SUM(total_price) AS total FROM sales")->fetch_assoc()['total'];
?>
<div class="card">
    <h4>Total Medicines: <?= $total_meds ?></h4>
    <h4>Total Sales: ₹<?= $total_sales ?></h4>
</div>