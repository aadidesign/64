<?php
session_start();
include('../config/db.php');

$uid = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM complaints WHERE user_id = $uid");

echo "<h2>Your Complaints</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<p><strong>{$row['subject']}</strong> - {$row['status']}</p>";
}
?>
