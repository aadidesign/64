<?php
include 'config.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$sql = "SELECT * FROM complaints";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $complaint_id = $_POST['complaint_id'];
    $status = $_POST['status'];

    $sql_update = "UPDATE complaints SET status = '$status' WHERE id = '$complaint_id'";
    if ($conn->query($sql_update) === TRUE) {
        echo "Complaint status updated!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <table>
            <tr>
                <th>Complaint Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="complaint_id" value="<?php echo $row['id']; ?>">
                            <select name="status">
                                <option <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                <option <?php echo ($row['status'] == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                                <option <?php echo ($row['status'] == 'Resolved') ? 'selected' : ''; ?>>Resolved</option>
                            </select>
                            <button type="submit" class="btn">Update Status</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
