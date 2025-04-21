<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Complaint Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center">Complaint Management System</h2>
  
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $subject = $conn->real_escape_string($_POST["subject"]);
    $message = $conn->real_escape_string($_POST["message"]);

    $sql = "INSERT INTO complaints (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
      echo "<div class='alert alert-success'>Complaint submitted successfully!</div>";
    } else {
      echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
  }
  ?>

  <form method="post" action="">
    <div class="mb-3">
      <label>Name:</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email:</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Subject:</label>
      <input type="text" name="subject" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Message:</label>
      <textarea name="message" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary w-100">Submit Complaint</button>
  </form>

  <div class="text-center mt-3">
    <a href="view_complaints.php">View All Complaints (Admin)</a>
  </div>
</div>

</body>
</html>
