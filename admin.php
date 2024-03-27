<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Food Items</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="maincss/homepage.css">
</head>
<body>
<div class="container my-5">
    <h2>Admin Panel - Manage Food Items</h2>
    <a class='btn btn-primary mb-3' href="add_food_item.php" role="button">Add New Food Item</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include database connection
        include 'config.php';
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

            // Fetch food items from multiple categories
            $sql = "SELECT food_items.*, categories.name AS category_name 
                    FROM food_items
                    INNER JOIN categories ON food_items.category_id = categories.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>$" . $row["price"] . "</td>";
                    echo "<td>" . $row["category_name"] . "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-primary btn-sm' href='edit_food_item.php?id=" . $row["id"] . "'>Edit</a>";
                    echo "<a class='btn btn-danger btn-sm ml-1' href='delete_food_item.php?id=" . $row["id"] . "'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No food items found.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
