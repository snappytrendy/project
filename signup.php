
<?php 
// Start the session
session_start();

// Include the database connection file
include "config.php";

// Initialize error message variable
$error_message = '';

// Check if the registration form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    // Password validation
    if (strlen($password) < 6 || !preg_match("/[0-9]/", $password) || !preg_match("/[a-zA-Z]/", $password) || !preg_match("/[^a-zA-Z0-9]/", $password)) {
        $error_message = 'Password must be at least 6 characters long and contain at least one number, one letter, and one special character.';
    } else {
        // Check if a user with the same email exists
        $sql_email = "SELECT * FROM users WHERE email='$email'";
        $result_email = $conn->query($sql_email);
          if ($result_email->num_rows > 0) {
                echo '<script>alert("A user with this emaiil already exists.");</script>';

            } else {
                // Hash the password for security
               // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Prepare and execute SQL statement to insert user data into the database
                $sql = "INSERT INTO users (name, email,password) VALUES ('$name', '$email','$password')";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['registration_success'] = true;
                    // Redirect to registration success page
                    header("Location:login.php");
                    exit();
                } else {
                    $error_message = 'Error: ' . $conn->error;
                }
            }
        
    }
    // Close database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="maincss/homepage.css">
    <title>SIGN UP PAGE</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('background.jpg'); /* Replace 'background.jpg' with your image path */
            background-size: cover;
            background-position: center;
        }

        section {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto; /* Center the form */
            width: 300px; /* Adjust width as needed */
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }
input[type="text"],
        input[type="email"],
        input[type="password"],select[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="cancel"] {
            background-color: #333;
            color:#3fa4cc;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>


    <section>
        <h2>Register New Client</h2>
        
        <?php 
        // Display error message if any
        if (!empty($error_message)) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" ><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    
    <input type="submit" value="Register">
</form>


    </section>

   
</body>
</html>
