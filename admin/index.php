<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Food Items</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheet1.css">
</head>
<body>
<div class="container my-5">
    <h2>Admin Panel - Manage Food Items</h2>
    
    <a class='btn btn-primary mb-3'  style='padding: 4px; background-color: red' href="add_food_item.php" role="button">Add New Food Item</a>
    <div class="row">
        <?php
        // Include database connection
        include '../config.php';
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch food items
        $sql = "SELECT * FROM food_items";
        $result = $conn->query($sql);

    

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-6'>";
                echo "<div class='card mb-3'>";
                echo "<img src='" . $row["image_url"] . "' class='card-img-top' alt='" . $row["name"] . "'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row["name"] . "</h5>";
                echo "<p class='card-text'>" . $row["description"] . "</p>";
                echo "<p class='card-text'>$" . $row["price"] . "</p>";
                echo "<a href='edit_food_item.php?id=" . $row["id"] . "' class='btn btn-primary'>Edit</a>";
                echo "<a href='delete_food_item.php?id=" . $row["id"] . "' class='btn btn-danger ml-2'>Delete</a>";
                echo "</div></div></div>";
            }
        } else {
            echo "<div class='col'><p>No food items found.</p></div>";
        }
        $conn->close();
        ?>
    </div>
</div>
</body>
</html>
