<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" href="StyleSheet1.css" />
    <link rel="shortcut icon icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoPvbCWfSLiGO6RPrXgNOCPClzqssjjLKeew&usqp=CAU" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUR MENU</title>
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

</head>

<body>
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoPvbCWfSLiGO6RPrXgNOCPClzqssjjLKeew&usqp=CAU" alt="MunchMeals" class="logo-img">
            </div>
            <div class="title">
                <h2> MUNCHMEALS CAFE</h2>
            </div>
            <ul>
                <li><a href="http://localhost/project/homepage.php">Home</a></li>
                <li><a href="http://localhost/project/aboutpage.php">About</a></li>
                <li><a href="http://localhost/project/contact%20page.php">Contacts</a></li>
                <li><a href="http://localhost/project/menu%20page.php">Our Menu</a></li>
            </ul>
    </nav>

    <style>
        .category-container {
            display: flex;
            flex-wrap: nowrap;
            /* Prevent wrapping onto multiple lines */
            overflow-x: auto;
            /* Enable horizontal scrolling */
            gap: 20px;
            /* Add space between items */
            padding-bottom: 20px;
            /* Add some space at the bottom */
        }

        .category-card {
            position: relative;
            width: 550px;
            height: 350px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .category-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .category-card:hover img {
            transform: scale(1.1);
        }

        .category-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .category-card:hover .category-overlay {
            opacity: 1;
        }

        .category-name {
            font-size: 25px;
            font-weight: bold;
        }

        .category-description {
            font-size: 20px;
        }

        .menu_h2 {
            color: #000;
            ;
            font-size: 20px;
        }
    </style>

    <div class="menu">
        <h2>Welcome to our menu! 🍽️ Explore our delicious offerings below, organized conveniently by category. Whether you're craving breakfast delights, refreshing drinks, or satisfying main meals, our menu has something for everyone. Simply click on your desired category to discover your favorites. Bon appétit:</h2>
    </div>
    <div class="category-list">
        <?php
        // Include database connection
        include 'config.php';

        // Query to retrieve categories
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);

        // Display categories as images with links
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="category-card">';
                echo '<a href="category.php?id=' . $row['id'] . '">';
                echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                echo '<div class="category-overlay">';
                echo '<div class="category-name">' . $row['name'] . '</div>';

                // Check if 'description' exists in the $row array
                if (isset($row['description'])) {
                    echo '<div class="category-description">' . $row['description'] . '</div>';
                }

                echo '</div>'; // Close .category-overlay
                echo '</a>';
                echo '</div>'; // Close .category-card
            }
        } else {
            echo 'No categories found.';
        }

        ?>
</body>

</html>