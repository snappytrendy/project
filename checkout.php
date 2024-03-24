<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Example styling for the checkout button */
        .checkout-btn {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        /* Example hover effect for the button */
        .checkout-btn:hover {
            background-color: #45a049;
            /* Darker green */
        }
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
                    for ($i = 0; $i < count($_GET['itemName']); $i++) {
                        echo "<tr>";
                        echo "<td>" . $_GET['itemName'][$i] . "</td>";
                        echo "<td>$" . $_GET['itemPrice'][$i] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // If no items are in the cart, display a message
                    echo "<tr><td colspan='2'>Your cart is empty.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="#" class="checkout-btn">Proceed to Checkout</a>
        <form class="order-form" action="process_order.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="special_requests">Special Requests:</label>
            <textarea id="special_requests" name="special_requests"></textarea>
            <br>
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method">
                <option value="cash">Cash</option>
            </select>
            <br>
            <input type="submit" value="Place Order">
            <a href="logout.php" class="logout-btn">Logout</a>
        </form>
    </div>
    <script>
        document.querySelector('.checkout-btn').addEventListener('click', function() {
            document.querySelector('.order-form').style.display = 'block';
        });
    </script>
    </div>

</body>

</html>