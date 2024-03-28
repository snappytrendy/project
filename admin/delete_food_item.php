<?php
// Include the database connection
include '../config.php';
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
     // Check if ID is set and not empty
     if (isset($_POST['id']) && !empty($_POST['id'])) {
         // Prepare a delete statement
         $sql = "DELETE FROM food_items WHERE id = ?";
 
         if ($stmt = $conn->prepare($sql)) {
             // Bind variables to the prepared statement as parameters
             $stmt->bind_param("i", $param_id);
 
             // Set parameters
             $param_id = $_POST['id'];
 
             // Attempt to execute the prepared statement
             if ($stmt->execute()) {
                 // Redirect to manage_food_items.php
                 header("location: manage_food_items.php");
                 exit();
             } else {
                 echo "Oops! Something went wrong. Please try again later.";
             }
         }
 
         // Close statement
         $stmt->close();
     } else {
         echo "Invalid request.";
     }
 }
 
 // Close connection
 $conn->close();
 ?>
 
