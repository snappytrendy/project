<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food Item</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="maincss/homepage.css">
</head>
<body>
<div class="container my-5">
    <h2>Edit Food Item</h2>
    <!-- Form for editing an existing food item -->
    <form action="edit_food_item_process.php" method="POST">
        <!-- Your form fields go here -->
        <!-- Example: -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $item['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $item['description']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $item['price']; ?>" required>
        </div>
        <input type="hidden" name="id" value="<?php echo $food_item['id']; ?>">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
