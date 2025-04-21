<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (strlen($password) < 6) {
    die("Password must be at least 6 characters.");
  }

  $hashed = password_hash($password, PASSWORD_DEFAULT);

  $file = fopen("users.txt", "a");
  fwrite($file, $username . "|" . $hashed . "\n");
  fclose($file);

  header("Location: index.html");
  exit();
}
?>
