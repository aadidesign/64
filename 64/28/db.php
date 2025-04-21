<?php
$conn = new mysqli("localhost", "root", "", "emailapp");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
