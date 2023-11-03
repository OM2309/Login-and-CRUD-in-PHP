<?php
session_start();

include('connection.php'); // Include your database connection file.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM `signin` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $res['name'];
    if (mysqli_num_rows($result) == 1) {
    echo "<script>alert('Login successfully');</script>";
      echo "<script>setTimeout(function(){ window.location.href='index.php'; }, 1000);</script>";
        exit;
    } else {
       echo "<script>alert('Incredintail do not match');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <h1 style="color:rgb(17, 107, 143); font-weight:bold">Login</h1>
        <form action="signup.php" method="post">
            <input type="text" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <button type="submit">Login</button>
            
            <p style="margin-top:0.5rem;">Not a member?<a href="signin.php" style="color:rgb(17, 107, 143); font-weight:bold"> Register here</a></p>
        </form>
    </div>
</body>
</html>
