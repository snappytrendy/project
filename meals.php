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

        <!-- Cart button to display the number of items added -->
        <div class="cart-buttons-container">
    <button class="cart-button" id="cartButton">Cart (0)</button>
    <button class="remove-cart-button" id="removeButton">Remove from Cart</button>
    </div>
<!-- Breakfast Section -->
<section class="breakfast" id="1">
        <div class="food-tag">Breakfast Section</div>

        <div class="row">
            <?php
            // Include database connection
            include 'config.php';
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch breakfast items
            $sql = "SELECT * FROM breakfast";
            $result = $conn->query($sql);

            // Display breakfast items with Add to Cart button
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='column'>";
                    echo "<h3>" . $row["name"] . "</h3>";
                    echo "<p>" . $row["description"] . "</p>";
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

            
            $sql = "SELECT * FROM salads";
            $result = $conn->query($sql);

            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='column'>";
                    echo "<h3>" . $row["name"] . "</h3>";
                    echo "<p> " . $row["description"] . "</p>";
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
   <style>
    /* Styles for Salads Section */
.salads {
  padding: 20px;
}

.food-tag {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; /* Distribute items evenly */
}

.column {
  flex: 0 0 calc(33.33% - 20px); /* Adjust width to fit three items per row */
  margin-bottom: 20px;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.column img {
  width: 100%;
  border-radius: 8px;
}

.column h3 {
  margin-top: 0;
}

.column p {
  margin: 5px 0;
}

.column .add-to-cart {
  display: block;
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  background-color: #4CAF50; /* Change the background color */
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.column .add-to-cart:hover {
  background-color: #45a049; /* Change the hover background color */
}
    </style>

 <!-- fastfood Section -->
 <section class="fastfoods" id="3">
    <div class="food-tag">Fastfood Section</div>
    <div class="line">
        <?php
        // Include database connection
        include 'config.php';
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM fastfood";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='columnar'>";
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

    <style>
    /* Styles for Fast Foods Section */

.fastfoods {
  padding: 20px;
}

.food-tag {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
  background-color:purple;
}

.line {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; /* Distribute items evenly */
}

.columnar {
  flex: 0 0 calc(33.33% - 20px); /* Adjust width to fit three items per row */
  margin-bottom: 20px;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.columnar img {
  width: 100%;
  border-radius: 8px;
}

.columnar h3 {
  margin-top: 0;
}

.columnar p {
  margin: 5px 0;
}

.columnar .add-to-cart {
  display: block;
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  background-color: green; /* Change the background color */
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.columnar .add-to-cart:hover {
  background-color: #E64A19; /* Change the hover background color */
}


</style>

<!-- Drinks Section -->
<section class="drinks" id="4">
    <div class="food-tag">Drinks Section</div>
    <div class="series">
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
            echo "<div class='shaft'>";
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
<style>
/* Styles for Drinks Section */
.drinks {
  padding: 20px;
}

.food-tag {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.series {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; /* Distribute items evenly */
}

.pillar {
  flex: 0 0 calc(33.33% - 20px); /* Adjust width to fit three items per row */
  margin-bottom: 20px;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.pillar img {
  width: 100%;
  border-radius: 8px;
}

.pillar h3 {
  margin-top: 0;
}

.pillar p {
  margin: 5px 0;
}

.pillar .add-to-cart {
  display: block;
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  background-color: #4CAF50; /* Change the background color */
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.pillar .add-to-cart:hover {
  background-color: #45a049; /* Change the hover background color */
}
</style>

<!-- mainmeals Section -->
<section class="mainmeals" id="5">
    <div class="food-tag">Mainmeals Section</div>
    <div class="array">
    <?php
        // Include database connection
        include 'config.php';
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM mainmeals";
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='shaft'>";
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
<style>
/* Styles for Main Meals Section */
.mainmeals {
  padding: 20px;
}

.food-tag {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.array {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; /* Distribute items evenly */
}

.shaft {
  flex: 0 0 calc(33.33% - 20px); /* Adjust width to fit three items per row */
  margin-bottom: 20px;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.shaft img {
  width: 100%;
  border-radius: 8px;
}

.shaft h3 {
  margin-top: 0;
}

.shaft p {
  margin: 5px 0;
}

.shaft .add-to-cart {
  display: block;
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  background-color: #4CAF50; /* Change the background color */
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.shaft .add-to-cart:hover {
  background-color: #45a049; /* Change the hover background color */
}
</style>

<!-- Dessert Section -->
<section class="dessert" id="6">
    <div class="food-tag">Dessert Section</div>
    <div class="rank">
    <?php
        // Include database connection
        include 'config.php';
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM dessert";
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='vertical'>";
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
<style>
/* Styles for Dessert Section */
.dessert {
  padding: 20px;
}

.food-tag {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.rank {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between; /* Distribute items evenly */
}

.vertical {
  flex: 0 0 calc(33.33% - 20px); /* Adjust width to fit three items per row */
  margin-bottom: 20px;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.vertical img {
  width: 100%;
  border-radius: 8px;
}

.vertical h3 {
  margin-top: 0;
}

.vertical p {
  margin: 5px 0;
}

.vertical .add-to-cart {
  display: block;
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  background-color: #4CAF50; /* Change the background color */
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.vertical .add-to-cart:hover {
  background-color: #45a049; /* Change the hover background color */
}
</style>

    <script>
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

    // Function to display notification
    // Function to display notification
function displayNotification(message) {
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.classList.add('notification', 'show');
    document.body.appendChild(notification);

    // Remove the notification after 3 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        notification.classList.add('hide');
        setTimeout(() => {
            notification.remove();
        }, 500); // Wait for the transition to complete before removing the element
    }, 3000);
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

        displayNotification(itemName + ' added to cart.');
    }

    // Function to handle click on the Remove button
    function removeFromCart(event) {
        // Check if cart is not empty
        if (itemsInCart > 0) {
            // Remove the last item from the cart
            cartItems.pop();
            // Decrease the number of items in cart by 1
            itemsInCart--;
            // Update the cart button text
            updateCartButton();
            
            // Display notification for item removed
            displayNotification('Item removed from cart.');
        }
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
<style>
    @media (max-width: 600px) {
            /* Override common styles for phone screens */
            body {
                padding: 10px; /* Adjust padding for smaller screens */
            }

            /* Specific styles for each section */
            .food-tag {
                font-size: 20px; /* Decrease font size for food tags on smaller screens */
            }

            /* Adjust column width for smaller screens */
            .column,
            .columnar,
            .pillar,
            .shaft,
            .vertical {
                flex-basis: 100%; /* Each item occupies full width on smaller screens */
            }
            }
        
        </style>

</body>


</html>