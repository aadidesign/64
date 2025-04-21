<?php
session_start();
include 'db.php';

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

$user = $_SESSION["user"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["post"])) {
    $content = $_POST["content"];
    $uid = $user["id"];
    $conn->query("INSERT INTO posts (user_id, content) VALUES ($uid, '$content')");
}
?>

<h2>Welcome, <?= $user["name"] ?>!</h2>
<a href="logout.php">Logout</a>

<h3>Post something</h3>
<form method="POST">
    <textarea name="content" required></textarea><br><br>
    <button type="submit" name="post">Post</button>
</form>

<h3>Timeline</h3>
<?php
$result = $conn->query("SELECT posts.content, posts.created_at, users.name 
                        FROM posts JOIN users ON posts.user_id = users.id 
                        ORDER BY posts.created_at DESC");

while ($row = $result->fetch_assoc()) {
    echo "<p><strong>{$row['name']}:</strong> {$row['content']} <br><small>{$row['created_at']}</small></p><hr>";
}
?>
