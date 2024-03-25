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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <title>OUR CATEGORIES</title>
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

<body>
    <!-- Breakfast Section -->
    <section class="breakfast" id="1">
        <div class="food-tag">Breakfast Section</div>
        <!-- Cart button to display the number of items added -->
        <button id="removeButton">Clear Cart</button>
        <button class="cart-button" id="cartButton">Cart (0)</button>

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
    </section>

    <!-- Salads Section -->
    <section class="salads" id="2">
        <div class="food-tag">Salad Section</div>
        <div class="row">
        <?php
            // Include database connection
            include 'config.php';
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


        $sql = "SELECT * FROM salad";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='salad'>";
                echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Price: $" . $row["price"] . "</p>";
                echo "<button class='add-to-cart' data-id='" . $row["id"] . "' data-name='" . $row["name"] . "' data-price='" . $row["price"] . "'>Add To Cart</button>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
    </section>

    <!-- fastfood Section -->
    <section class="fastfood" id="3">
        <div class="food-tag">Fastfood Section</div>
        <div class="row">
        <?php
            // Include database connection
            include 'config.php';
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT * FROM fast_foods";
            $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='fastfood'>";
                echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Price: $" . $row["price"] . "</p>";
                echo "<button class='add-to-cart' data-id='" . $row["id"] . "' data-name='" . $row["name"] . "' data-price='" . $row["price"] . "'>Add To Cart</button>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
    </section>

    <!-- drinks Section -->
    <section class="drinks" id="4">
        <div class="food-tag">Drinks Section</div>
        <div class="row">
        <?php
            // Include database connection
            include 'config.php';
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT * FROM drinks";
            $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='drinks'>";
                echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Price: $" . $row["price"] . "</p>";
                echo "<button class='add-to-cart' data-id='" . $row["id"] . "' data-name='" . $row["name"] . "' data-price='" . $row["price"] . "'>Add To Cart</button>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
    </section>

    <!-- mainmeals Section -->
    <section class="mainmeals" id="5">
        <div class="food-tag">Mainmeals Section</div>
        <div class="row">
        <?php
            // Include database connection
            include 'config.php';
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT * FROM main_meals";
            $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='mainmeals'>";
                echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Price: $" . $row["price"] . "</p>";
                echo "<button class='add-to-cart' data-id='" . $row["id"] . "' data-name='" . $row["name"] . "' data-price='" . $row["price"] . "'>Add To Cart</button>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
    </section>

    <!-- dessert Section -->
    <section class="dessert" id="6">
        <div class="food-tag">Dessert Section</div>
        <div class="row">
        <?php
            // Include database connection
            include 'config.php';
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $sql = "SELECT * FROM desserts";
            $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='dessert'>";
                echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p>Price: $" . $row["price"] . "</p>";
                echo "<button class='add-to-cart'data-id='" . $row["id"] . "' data-name='" . $row["name"] . "' data-price='" . $row["price"] . "'>Add To Cart</button>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
    </section>

    <script>
        // JavaScript code remains the same
        // Get the cart button and items added to cart count
        const cartButton = document.getElementById('cartButton');
        let itemsInCart = 0;
        let cartItems = []; // Array to store cart items

        // Function to update the cart button text
        function updateCartButton() {
            cartButton.textContent = `Cart (${itemsInCart})`;
            if (itemsInCart > 0) {
                cartButton.addEventListener('click', redirectToCheckoutPage);
            } else {
                cartButton.removeEventListener('click', redirectToCheckoutPage);
            }
        }

        // Function to handle click on the Add to Cart button
        function addToCart(event) {
            const button = event.target;
            const itemName = button.getAttribute('data-name');
            const itemPrice = button.getAttribute('data-price');
            const itemImage = button.getAttribute('data-image');

            itemsInCart++;
            cartItems.push({
                name: itemName,
                price: itemPrice
            });

            updateCartButton();
        }

        // Function to handle click on the Remove button
        function removeFromCart() {
            itemsInCart = 0;
            cartItems = [];
            updateCartButton();
        }

        // Function to redirect to checkout.php
        function redirectToCheckoutPage() {
            const url = new URL('http://localhost/project/checkout.php');
            url.searchParams.append('itemsInCart', itemsInCart);
            cartItems.forEach(item => {
                url.searchParams.append('itemName[]', item.name);
                url.searchParams.append('itemPrice[]', item.price);
            });
            window.location.href = url;
        }

        // Add event listeners to Add to Cart buttons
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', addToCart);
        });

        // Add event listener to the Remove button
        document.getElementById('removeButton').addEventListener('click', removeFromCart);
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the ID from the URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const categoryId = urlParams.get('id');

            // Scroll to the section with the corresponding ID
            const section = document.getElementById(categoryId);
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    </script>


</body>


</html>