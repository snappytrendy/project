<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="StyleSheet" href="stylesheet1.css" />
  <title>Combined Cart and Order Page</title>
  </style>
</head>

<body>
  <div class="ordercontainer">
    <!-- Cart Items -->
    <div class="cart">
      <h2>Your Cart</h2>
      <div class="cart-item">
        <h3>Product Name</h3>
        <p>Price: $price</p>
        <input type="number" value="1" min="1">
        <button>Remove</button>
      </div>
      <!-- Repeat cart-item div for each item in the cart -->
    </div>
    <!-- Order Form -->
    <div class="order-form">
      <h2>Order Details</h2>
      <form>
        <input type="text" placeholder="Full Name" required>
        <input type="email" placeholder="Email" required>
        <input type="text" placeholder="Address" required>
        <select>
          <option value="">Select Payment Method</option>
          <option value="credit_card">cash</option>
          <option value="paypal">PayPal</option>
        </select>
        <textarea placeholder="Order Notes"></textarea>
        <button type="submit">Place Order</button>
      </form>
      <!-- Order Summary -->
      <div class="order-summary">
        <h2>Order Summary</h2>
        <p>Subtotal: $10</p>
        <h3>Total: $16</h3>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Add event listener to the "Add to Cart" button
      document.getElementById('add-to-cart-button').addEventListener('click', function() {
        // Get the product name and price from the table
        let productName = document.getElementById('name').innerText;
        let productPrice = parseFloat(document.getElementById('price').innerText);

        // Call the addToCart function with the product name and price
        addToCart(productName, productPrice);
      });

      // Add event listeners to remove buttons
      let removeButtons = document.querySelectorAll('.cart-remove-button');
      removeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          // Get the parent element of the button (the cart item)
          let cartItem = button.closest('.cart-item');
          // Remove the cart item from the DOM
          cartItem.remove();
          // Update the cart data in localStorage (remove the corresponding item)
          updateCartData();
        });
      });
    });

    function addToCart(productName, price) {
      // Retrieve existing cart data from localStorage or initialize an empty array
      let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

      // Add the new item to the cart
      cartItems.push({
        name: productName,
        price: price
      });

      // Update the cart data in localStorage
      localStorage.setItem('cartItems', JSON.stringify(cartItems));

      // Show a message to confirm that the item has been added to the cart
      alert(productName + ' has been added to the cart.');
    }

    function updateCartData() {
      // Get all cart items
      let cartItems = document.querySelectorAll('.cart-item');

      // Initialize an array to store cart data
      let cartData = [];

      // Iterate over each cart item and extract its data
      cartItems.forEach(function(item) {
        let productName = item.querySelector('.cart-product-name').textContent;
        let productPrice = parseFloat(item.querySelector('.cart-price').textContent.replace('Price: $', ''));
        cartData.push({
          name: productName,
          price: productPrice
        });
      });

      // Update the cart data in localStorage
      localStorage.setItem('cartItems', JSON.stringify(cartData));
    }
  </script>
</body>

</html>