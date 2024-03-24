<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <style> 
        .form-container { display: none; }
        .form-container form { margin-top: 20px; }
        .form-container label { display: block; margin-top: 10px; }
        .form-container textarea { width: 100%; height: 100px; }
        .form-container select { width: 100%; }
        .form-container input[type="submit"] { margin-top: 10px; }
        .notification { padding: 20px; background-color: #4CAF50; color: white; margin-bottom: 15px; display: none; } 
    </style>

</head> 
<body> 
    <div class="container"> 
        <h2>Your Order</h2> 
        <table> 
            <thead> 
                <tr> 
                    <th>Item</th> 
                    <th>Price</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php 
                // Check if itemName and itemPrice arrays are set 
                if (isset($_GET['itemName']) && isset($_GET['itemPrice'])) { 
                    // Loop through itemName array and display items along with prices 
                    $total_amount = 0; 
                    for ($i = 0; $i < count($_GET['itemName']); $i++) { 
                        $total_amount += $_GET['itemPrice'][$i]; 
                        echo "<tr>"; 
                        echo "<td>" . $_GET['itemName'][$i] . "</td>"; 
                        echo "<td>$" . $_GET['itemPrice'][$i] . "</td>"; 
                        echo "</tr>"; 
                    } 
                } else { 
                    // If no items are in the cart, display a message 
                    echo "<tr><td colspan='2'>Your cart is empty.</td></tr>"; 
                    $total_amount = 0; 
                } 
                ?> 
            </tbody> 
        </table> 
        <p>Total Amount: $<?php echo $total_amount; ?></p> 
        <button id="show-form">Proceed to Checkout</button> 
        <div class="form-container"> 
            <form id="order-form" method="post"> 
                <label for="email">Email:</label> 
                <input type="email" id="email" name="email" required><br> 
                <label for="special_requests">Special requests:</label> 
                <textarea id="special_requests" name="special_requests"></textarea><br> 
                <label for="payment_method">Payment method:</label> 
                <select id="payment_method" name="payment_method"> 
                    <option value="cash">Cash</option> 
                </select><br> 
                <input type="hidden" name="total_amount" id="total_amount_input" value="<?php echo $total_amount; ?>"> 
                <input type="submit" value="Place Order"> 
            </form> 
        </div> 
        <?php 
        if (isset($_POST['total_amount'])) { 
            $total_amount = $_POST['total_amount']; 
            $email = $_POST['email']; 
            $special_requests = $_POST['special_requests']; 
            $payment_method = $_POST['payment_method']; 
            // Insert the order details into the orders table 
            include 'config.php'; 
            $sql = "INSERT INTO orders (email, special_requests, payment_method, total_amount) VALUES ('$email', '$special_requests', '$payment_method', $total_amount)"; 
            if ($conn->query($sql) === TRUE) { 
                echo "<div class='notification'> 
                    <p>Order placed successfully!</p> 
                    <button id='logout-btn' onclick='window.close()'>Logout and Close</button> 
                </div>"; 
            } else { 
                echo "Error: " . $sql . "<br>" . $conn->error; 
            } 
            $conn->close(); 
        } 
        ?> 
    </div> 
    <script> 
        document.getElementById('show-form').addEventListener('click', function () { 
            document.querySelector('.form-container').style.display = 'block'; 
        }); 
        document.getElementById('order-form').addEventListener('submit', function (event) { 
            event.preventDefault(); // Get the form data 
            var email = document.getElementById('email').value; 
            var special_requests = document.getElementById('special_requests').value; 
            var payment_method = document.getElementById('payment_method').value; 
            var total_amount = document.getElementById('total_amount_input').value; 
            // Send the order details to the server 
            var xhr = new XMLHttpRequest(); 
            xhr.open('POST', 'checkout.php', true); 
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
            xhr.onload = function () { 
                if (this.status == 200) { 
                    window.location.reload(); 
                } 
            }; 
            xhr.send('total_amount=' + total_amount + '&email=' + email + '&special_requests=' + special_requests + '&payment_method=' + payment_method); 
        }); 

    </script> 
    

</body>

</html>
