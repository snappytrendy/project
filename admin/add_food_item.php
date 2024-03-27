<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Food Item</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="maincss/homepage.css">
</head>
<body>
<div class="container my-5">
    <h2>Add New Food Item</h2>
    <!-- Form for adding a new food item -->
    <form action="add_food_item_process.php" method="POST">
        <!-- Your form fields go here -->
        <!-- Example: -->
        <div class="form-group">
            <label for="name">Name:</label><br>
            <input type="text" class="form-control" id="name" name="name" required><br>
        </div>
        <div class="form-group">
            <label for="description">Description:</label><br>
            <input type="text" class="form-control" id="description" name="description" required><br>
        </div>
        <div class="form-group">
            <label for="price">Price:</label><br>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required><br>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <style>
        /* Custom styles */
        .container {
            background-color: #f8f9fa; /* Light gray background */
            padding-top: 20px;
        }
        .btn-primary {
            background-color: red; /* Red color for primary buttons */
            border-color: red;
            padding: 8px 16px; /* Increase padding */
        }
        .btn-primary:hover {
            background-color: #dc3545; /* Darker red on hover */
            border-color: #dc3545;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-img-top {
            max-height: 200px; /* Limit image height */
            object-fit: cover; /* Ensure the image covers the entire space */
        }
        .card-title {
            color: #007bff; /* Blue color for card titles */
            margin-bottom: 10px;
        }
        .card-text {
            color: #6c757d; /* Gray color for card text */
        }
    </style>
</div>
</body>
</html>
