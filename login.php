<?php
 include 'config.php'; 
session_start();
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $result = mysqli_query($conn,"select * from users where email= '".$email."' AND password= '".$pass."'");
    $row = mysqli_fetch_array($result);

   if($row['password'] ==$pass && $row['email'] ==$email){
    
        $_SESSION["email"]=$email;
           header("location: homepage.php");
    }
    else{
        

        echo '<script>alert("wrong password or email.");</script>';
        exit;
    }    
}
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name"viewport" content="width=device-width, initial-scale=0.8">
    <link rel="shortcut icon icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoPvbCWfSLiGO6RPrXgNOCPClzqssjjLKeew&usqp=CAU" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN page</title>
</head>
<body>
<div id="login-form" class="form-container">
    
    <form action="" method="POST">
        <h2>Already have an account login!</h2>
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" name="email" required>
        <br>
        <label for="login-password">Password:</label>
        <input type="password" id="login-password" name="password" required>
        <br>
        <button type="submit">Submit</button>
    </form>
    <h3> Dont have an account click  <a href="http://localhost/project/signup.php">here</a> to signup!<h3>
    <div id="successMessage" class="success"></div>
    <div id="errorMessage" class="error"></div>
</div>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }
        .form-container {
            background-color: #fff;
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .success {
            color: #4caf50;
        }
        .error {
            color: #f44336;
        }
    </style>
</body>
</html>