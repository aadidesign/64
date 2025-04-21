<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: admin/dashboard.php");
} else {
    header("Location: auth/login.php");
}
?>