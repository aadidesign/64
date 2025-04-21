<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $file = fopen("users.txt", "r");
  $valid = false;

  while (($line = fgets($file)) !== false) {
    list($storedUser, $storedHash) = explode("|", trim($line));
    if ($storedUser === $username && password_verify($password, $storedHash)) {
      $valid = true;
      break;
    }
  }

  fclose($file);

  if ($valid) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit();
  } else {
    echo "Invalid credentials.";
  }
}
?>
