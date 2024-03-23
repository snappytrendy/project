<?php
// Establish a connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order_platform"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $category_id = $conn->real_escape_string($_GET['id']);

    // Prepare SQL query to fetch category details by id
    $sql = "SELECT * FROM categories WHERE id = $category_id";
    $result = $conn->query($sql);

    // Check if a category with the given id exists
    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
        // Display category details
        echo '<h1>' . $category['name'] . '</h1>';
        echo '<img src="' . $category['image'] . '" alt="' . $category['name'] . '">';
        echo '<p>' . $category['description'] . '</p>';

        // Redirect user to different pages based on category ID
        switch ($category_id) {
            case 1:
                header("Location: breakfastpage.php");
                break;
            case 2:
                header("Location: saladspage.php");
                break;
            // Add more cases for other category IDs and corresponding pages if needed
            default:
                // Redirect to a default page if category ID doesn't match any specific case
                header("Location: defaultpage.php");
        }
        exit(); // Make sure to exit after redirection
    } else {
        echo 'Category not found.';
    }
} else {
    echo 'Invalid category ID.';
}

// Close the database connection
$conn->close();
?>
