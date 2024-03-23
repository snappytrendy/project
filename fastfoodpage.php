<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" href="StyleSheet1.css" />
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
<div class="row">
    <?php
    // Include database connection
    include 'config.php';
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch breakfast items
    $sql = "SELECT * FROM fast_foods";
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
    // Function to handle adding items to the cart
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            // Get item details from the button's data attributes
            let itemName = this.getAttribute('data-name');
            let itemPrice = parseFloat(this.getAttribute('data-price'));

            // You can perform additional operations here like updating UI, sending data to server etc.

            // For demonstration purposes, let's just print the item details to the console
            console.log("Item added to cart: " + itemName + ", Price: $" + itemPrice);
        });
    });
</script>

</div>
</body>

</html>