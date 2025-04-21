<?php
include 'db.php';

$email = $_GET['email'];
$token = $_GET['token'];

$sql = "SELECT * FROM users WHERE email='$email' AND token='$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $update = "UPDATE users SET status='verified' WHERE email='$email'";
    $conn->query($update);
    echo "Email successfully verified!";
} else {
    echo "Invalid verification link.";
}
?>
