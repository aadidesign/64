<?php
session_start();
include('../config/db.php');

// Update Status
if (isset($_POST['update'])) {
    $id = $_POST['cid'];
    $status = $_POST['status'];
    $stmt = $conn->prepare("UPDATE complaints SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
}

$result = $conn->query("SELECT complaints.*, users.name FROM complaints JOIN users ON complaints.user_id = users.id");

echo "<h2>All Complaints</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<form method='POST'>
        <input type='hidden' name='cid' value='{$row['id']}'>
        <p><strong>{$row['subject']}</strong> by {$row['name']} - Current Status: {$row['status']}</p>
        <select name='status'>
            <option>Pending</option>
            <option>In Progress</option>
            <option>Resolved</option>
        </select>
        <button name='update'>Update</button>
    </form><hr/>";
}
?>
