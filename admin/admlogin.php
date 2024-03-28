<?php
session_start();

if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin_dashboard.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
include '../config.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM admin WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value=" Login ">
    </form>
</body>
</html>
