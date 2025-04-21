<?php
include('db.php');

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>List of Admitted Students</h1>";
    echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Course</th><th>Admission Date</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['course'] . "</td><td>" . $row['admission_date'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No students admitted yet.";
}
?>
