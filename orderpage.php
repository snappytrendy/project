<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h1>Checkout</h1>
    
    <div class="order-summary">
        <h2>Order Summary</h2>
        <ul>
            <?php
            // Check if items are added to cart
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['items'])) {
                // Loop through the items array and display each item
                $items = $_POST['items'];
                foreach ($items as $item) {
                    echo "<li>$item</li>";
                }
            } else {
                // If no items are added to cart, display a message
                echo "<li>No items added to the cart.</li>";
            }
            ?>
        </ul>
    </div>

    <div class="checkout-form">
        <!-- Add your checkout form fields here (e.g., name, address, payment details, etc.) -->
        <!-- Example: -->
        <form method="post" action="process_order.php">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <!-- Add more form fields as needed -->
            <input type="submit" value="Place Order">
        </form>
    </div>

</body>
</html>
