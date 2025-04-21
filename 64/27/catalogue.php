<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Catalogue</title>
</head>
<body>
    <h2>Welcome to the Book Catalogue</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Title</th><th>Author</th><th>Genre</th><th>Price</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM books");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>{$row['author']}</td>
                    <td>{$row['genre']}</td>
                    <td>₹{$row['price']}</td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
