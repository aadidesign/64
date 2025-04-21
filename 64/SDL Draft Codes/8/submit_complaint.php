<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];  // Assuming user_id is stored in session after login
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO complaints (user_id, title, description) VALUES ('$user_id', '$title', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Complaint</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Submit a New Complaint</h2>
        <form method="POST">
            <input type="text" name="title" placeholder="Enter Complaint Title" required>
            <textarea name="description" placeholder="Enter Complaint Description" required></textarea>
            <button type="submit" class="btn">Submit Complaint</button>
        </form>
    </div>
</body>
</html>
