<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Complaints</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center">All Complaints</h2>
  <table class="table table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $result = $conn->query("SELECT * FROM complaints ORDER BY id DESC");
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['subject']}</td>
              <td>{$row['message']}</td>
              <td>{$row['date']}</td>
            </tr>";
          }
        } else {
          echo "<tr><td colspan='6' class='text-center'>No complaints found.</td></tr>";
        }
      ?>
    </tbody>
  </table>
  <a href="index.php" class="btn btn-secondary">Back to Form</a>
</div>

</body>
</html>
