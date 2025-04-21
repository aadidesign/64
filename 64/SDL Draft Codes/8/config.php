<?php
$host = "localhost";
$user = "root";
$password = "aaditya@1234";
$dbname = "complaint_system";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
