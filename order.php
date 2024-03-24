<div class="form-container" style="display: none;">
  <form id="order-form" method="post" action="submit_order.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="special_requests">Special requests:</label>
    <textarea id="special_requests" name="special_requests"></textarea>
    <br>
    <label for="payment_method">Payment method:</label>
    <select id="payment_method" name="payment_method">
      <option value="cash">Cash</option>
    </select>
    <br>
    <input type="submit" value="Place Order">
    <a href="logout.php" class="logout-btn">Logout</a>
  </form>
</div>

<?php
            // Include database connection
            include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $special_requests = $_POST["special_requests"];
    $payment_method = $_POST["payment_method"];
    $total_amount = 100; // replace this with the actual total amount

    $stmt = $conn->prepare("INSERT INTO orders (email, special_requests, payment_method, total_amount) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $email, $special_requests, $payment_method, $total_amount);
    $stmt->execute();
    echo "Order placed successfully. Your total amount to be paid is $" . $total_amount;
    echo "<br>";
    echo "<a href='logout.php'>Logout</a>";
}

$conn->close();
?>