<?php
session_start();

if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    
    exit;
}

 // Include database connection
 include '../config.php';

// Handle CRUD operations here

// Example: Display list of items
$query = "(
    SELECT item_id, item_name, price
    FROM breakfast
)
UNION
(
    SELECT item_id, item_name, price
    FROM salads
)
UNION
(
    SELECT item_id, item_name, price
    FROM mainmeals
    )
    UNION
(
    SELECT item_id, item_name, price
    FROM fastfood
    )
    UNION
(
    SELECT item_id, item_name, price
    FROM dessert
    )
    UNION
(
    SELECT item_id, item_name, price
    FROM drinks
    )
    UNION
(
    SELECT item_id, item_name, price
    FROM categories
    

)";
$result = mysqli_query($conn, $query);

// Add/Edit/Delete operations
// You can handle CRUD operations here

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome Admin</h2>
    <a href="logout.php">Logout</a>
    
    <h3>Items</h3>
    <table border="1">
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['item_id']}</td>";
            echo "<td>{$row['item_name']}</td>";
            echo "<td>{$row['price']}</td>";
            // Add edit/delete links/buttons here
            echo "<td><a href='edit_item.php?item_id={$row['item_id']}'>Edit</a> | <a href='delete_item.php?item_id={$row['item_id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

    </table>
    <!-- Add form for adding new item -->
    <h3>Add New Item</h3>
    <form method="post" action="add_item.php">
        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required><br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br>
        <!-- Add more fields if necessary -->
        <input type="submit" value="Add Item">
    </form>
</body>
</html>
