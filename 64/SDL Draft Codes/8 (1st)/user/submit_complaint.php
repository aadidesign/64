<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $desc = $_POST['description'];
    $uid = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO complaints (user_id, subject, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $uid, $subject, $desc);
    $stmt->execute();
    echo "Complaint submitted successfully!";
}
?>

<form method="POST">
    <input type="text" name="subject" required placeholder="Complaint Subject" />
    <textarea name="description" required placeholder="Complaint Description"></textarea>
    <button type="submit">Submit</button>
</form>
