<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");
    if ($result->num_rows == 1) {
        $_SESSION["user"] = $result->fetch_assoc();
        header("Location: home.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
