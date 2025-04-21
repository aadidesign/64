<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_COOKIE['user'])) {
    header("Location: index.php");
    exit;
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : $_COOKIE['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Welcome, <?= htmlspecialchars($username) ?>!</h2>
                <p class="text-center">You are logged in. Here's your dashboard.</p>

                <?php
                if (isset($_COOKIE['user'])) {
                    echo "<p>Cookie set: " . $_COOKIE['user'] . "</p>";
                } else {
                    echo "<p>No cookie found.</p>";
                }
                ?>

                <div class="text-center mt-4">
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
