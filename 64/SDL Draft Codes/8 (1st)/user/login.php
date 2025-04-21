<?php
session_start();
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $query->store_result();
    $query->bind_result($id, $hashed_password);
    $query->fetch();

    if ($query->num_rows == 1 && password_verify($pass, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        header("Location: dashboard.php");
    } else {
        echo "Invalid login";
    }
}
?>

<form method="POST">
    <input type="email" name="email" required placeholder="Email" />
    <input type="password" name="password" required placeholder="Password" />
    <button type="submit">Login</button>
</form>
