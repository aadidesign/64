<?php
include('../config/db.php');
$res = $conn->query("SELECT tr.*, v.vehicle_number, tb.booth_name
    FROM toll_records tr
    JOIN vehicles v ON tr.vehicle_id = v.id
    JOIN toll_booths tb ON tr.booth_id = tb.id
    ORDER BY tr.passed_at DESC");
?>

<h3>All Toll Transactions</h3>
<table border="1">
<tr><th>Date</th><th>Vehicle</th><th>Booth</th><th>Amount</th></tr>
<?php while($r = $res->fetch_assoc()): ?>
<tr>
    <td><?= $r['passed_at'] ?></td>
    <td><?= $r['vehicle_number'] ?></td>
    <td><?= $r['booth_name'] ?></td>
    <td>₹<?= $r['toll_amount'] ?></td>
</tr>
<?php endwhile; ?>
</table>
