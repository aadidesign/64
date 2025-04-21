<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $token = md5(rand()); // Simple token

    $sql = "INSERT INTO users (name, email, token) VALUES ('$name', '$email', '$token')";
    if ($conn->query($sql)) {
        echo "Registration successful!<br>";
        echo "Click to verify: <a href='verify.php?email=$email&token=$token'>Verify Email</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <input type="submit" name="submit" value="Register">
</form>
