<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Toll Tax Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Toll Tax Entry</h2>

  <!-- Toll Form -->
  <form method="post" class="mb-4">
    <div class="row">
      <div class="col">
        <input type="text" name="vehicle_no" class="form-control" placeholder="Vehicle Number" required>
      </div>
      <div class="col">
        <select name="vehicle_type" class="form-control" required>
          <option value="">Select Vehicle Type</option>
          <option value="Car">Car</option>
          <option value="Truck">Truck</option>
          <option value="Bike">Bike</option>
          <option value="Bus">Bus</option>
        </select>
      </div>
      <div class="col">
        <input type="number" name="amount" class="form-control" placeholder="Toll Amount" required>
      </div>
      <div class="col">
        <button type="submit" name="submit" class="btn btn-primary w-100">Add Entry</button>
      </div>
    </div>
  </form>

  <!-- Insert into DB -->
  <?php
  if (isset($_POST['submit'])) {
      $vno = $_POST['vehicle_no'];
      $vtype = $_POST['vehicle_type'];
      $amount = $_POST['amount'];

      $sql = "INSERT INTO toll_data (vehicle_no, vehicle_type, amount) VALUES ('$vno', '$vtype', '$amount')";
      if ($conn->query($sql)) {
          echo "<div class='alert alert-success'>Entry added!</div>";
      } else {
          echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
      }
  }
  ?>

  <!-- Display Data -->
  <h4 class="mt-5">Toll Collection Records</h4>
  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>ID</th>
        <th>Vehicle No</th>
        <th>Type</th>
        <th>Date</th>
        <th>Amount (₹)</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM toll_data ORDER BY date_time DESC");
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['vehicle_no']}</td>
              <td>{$row['vehicle_type']}</td>
              <td>{$row['date_time']}</td>
              <td>{$row['amount']}</td>
          </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
