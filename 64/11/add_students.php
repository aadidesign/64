<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
</head>
<body>
    <h1>Add New Student</h1>
    <form method="POST">
        <label for="name">Full Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" name="email" required><br><br>

        <label for="course">Course:</label><br>
        <input type="text" name="course" required><br><br>

        <button type="submit">Add Student</button>
    </form>
</body>
</html>
