<?php
 // Include database connection
 include 'config.php';
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

// Check if ID parameter is present in URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute SQL statement to delete the food item
    $sql = "DELETE FROM food_items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirect back to admin page after deletion
    header("Location: admin.php");
    exit();
} else {
    // Redirect to admin page if ID parameter is not present
    header("Location: admin.php");
    exit();
}
?>
