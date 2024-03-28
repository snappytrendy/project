<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Include database connection
include 'config.php';

// Check if item ID is provided
if (!isset($_GET['item_id'])) {
    header("Location: admin_dashboard.php");
    exit;
}

$item_id = $_GET['item_id'];

// Fetch item details based on ID
$query = "SELECT * FROM items WHERE item_id = $item_id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Item not found.";
    exit;
}

$item = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $new_name = $_POST['name'];
    $new_price = $_POST['price'];

    // Update item details in the database
    $update_query = "UPDATE items SET item_name = '$new_name', price = '$new_price' WHERE item_id = $item_id";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "Item updated successfully!";
        // Redirect to admin dashboard after updating
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error updating item: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h2>Edit Item</h2>
    <form method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $item['item_name']; ?>" required><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $item['price']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
