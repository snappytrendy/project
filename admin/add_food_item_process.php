<?php
// Include the database connection
include '../config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = floatval($_POST['price']); // Convert to float
    // $category_id = intval($_POST['category_id']); // Convert to integer
    // $image_url = htmlspecialchars($_POST['image_url']);

    // // Prepare and bind the SQL statement
    // $stmt = $conn->prepare("INSERT INTO food_items (name, description, price) VALUES ($name, $description, $price)");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // $sql = "INSERT INTO food_items (name, description, price) VALUES ($_POST['name'], $_POST['description'], floatval($_POST['price'])";

    $sql = $sql = "INSERT INTO food_items (name, description, price)
        VALUES ('John', 'Doe', 30)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
