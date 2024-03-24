<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="StyleSheet" href="stylesheet1.css" />
    <link rel="shortcut icon icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoPvbCWfSLiGO6RPrXgNOCPClzqssjjLKeew&usqp=CAU" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUNCHMEALS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
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
        <?php include 'order.php'; ?>
    </div>
    <script>
        document.querySelector('.checkout-btn').addEventListener('click', function() {
            document.querySelector('.order-form').style.display = 'block';
        });
    </script>
    </div>

</body>

</html>