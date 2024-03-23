<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta name"viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" href="stylesheet1.css" />
    <link rel="shortcut icon icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoPvbCWfSLiGO6RPrXgNOCPClzqssjjLKeew&usqp=CAU" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR MENU</title>
    <style>
        body {
            background-image: url(); 
            background-color: #808080;
            background-size: 100%, 50%; 
            background-position: top; 
            background-repeat: no-repeat; 
            color: white; 
            padding: 20px; 
            text-align: center; 
            opacity: 1.0; 
        }
    </style>
   
</head>
<style>
/* Container for the whole page */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

/* Style for the heading */
h1 {
  text-align: center;
  margin-bottom: 20px;
}

/* Define the column class */
.column {
  float: left;
  width: 33.33%; /* Each card takes up 1/3 of the width */
  padding: 5px;
  position: relative; /* Position relative for absolute positioning */
}

/* Style for the image */
.column img {
  width: 100%; /* Ensure images take the full width of the container */
  height: auto; /* Maintain aspect ratio */
  display: block;
}

/* Style for the text overlay */
.text-overlay {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  padding: 10px;
  text-align: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

/* Show text overlay on hover */
.column:hover .text-overlay {
  opacity: 1;
}

/* Style for the Add to Cart button */
.add-to-cart {
  display: block;
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin-top: 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
}

.add-to-cart:hover {
  background-color: #45a049;
}

</style>
<div class="row">
<?php
// Include database connection
include 'config.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch breakfast items
$sql = "SELECT * FROM breakfast_items";
$result = $conn->query($sql);

// Display breakfast items with Add to Cart button
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='column'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>Description: " . $row["description"] . "</p>";
        echo "<p>Price: $" . $row["price"] . "</p>";
        echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "' style='max-width: 100%;'>";
        echo "<button class='add-to-cart' data-name='" . $row["name"] . "' data-price='" . $row["price"] . "' data-image='" . $row["image_url"] . "'>Add to Cart</button>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</div>
<script>
    // JavaScript to handle "Add to Cart" button click
    document.addEventListener("DOMContentLoaded", function() {
        const addToCartButtons = document.querySelectorAll(".add-to-cart");
        addToCartButtons.forEach(button => {
            button.addEventListener("click", function() {
                const name = this.parentElement.querySelector("h2").textContent;
                alert("Product " + name + " was added successfully!"); // Display success message
            });
        });
    });
</script>
 
    </body>
    </html>