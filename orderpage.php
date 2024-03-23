<?php
// Start the session
session_start();

// Check if the cart is set in the session
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Output the cart items
    echo "<h1>Your Cart</h1>";
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>" . $item['name'] . " - $" . $item['price'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<h1>Your Cart is Empty</h1>";
}
?>
