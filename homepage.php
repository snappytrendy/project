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
    <style>
        body {
            background-image: url(https://img.freepik.com/free-photo/fresh-colourful-ingredients-mexican-cuisine_23-2148254294.jpg);
            background-color: white;
            background-size: 100%, 50%;
            background-position: top;
            background-repeat: round;
            color: black;
            padding: 20px;
            text-align: center;
            opacity: 1.5;
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
            <a href="http://localhost/project/signup.php"><button>Sign Up</button></a>
            <a href="http://localhost/project/login.php"><button>Login</button></a>
        </div>
    </nav>
    <style>
        .search-cart-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f2f2f2;
            padding: 10px 0;
        }

        .search-container {
            text-align: center;
        }

        #search-input {
            padding: 10px;
            width: 500px;
            /* Adjust width as needed */
            height: 50px;
        }

        #search-btn {
            padding: 10px 20px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #search-btn:hover {
            background-color: rgb(255, 106, 0);
        }

        .cart-icon {
            width: 40px;
            height: 40px;
            cursor: pointer;
            margin-left: 20px;
            /* Adjust margin as needed */
        }

        .cart-icon img {
            width: 100%;
            height: 100%;
        }
    </style>

    <div class="home">
        <div class="main_slide">
            <div>
                <hi> Enjoy <span> Quality Taste</span> in your meal.<hi>
            </div>
        </div>
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
        </style>
        <h2>Browse by Category:</h2>
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
            <div class="container">
                <button id="showFormBtn">Book Your Table</button>
                <form id="bookingForm" class="hidden">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="time" id="time" name="time" required>
                    </div>
                    <div class="form-group">
                        <label for="people">Number of People:</label>
                        <input type="number" id="people" name="people" required>
                    </div>
                    <div class="form-group">
                        <label for="specialRequests">Special Requests:</label>
                        <textarea id="specialRequests" name="specialRequests" rows="4"></textarea>
                    </div>
                    <button type="submit">Book Now</button>

                    <script>
                        document.getElementById('showFormBtn').addEventListener('click', function() {
                            document.getElementById('bookingForm').classList.remove('hidden');
                        });
                    </script>
                </form>
            </div>
</body>

</html>