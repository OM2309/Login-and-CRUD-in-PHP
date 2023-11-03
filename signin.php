<?php


include('connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $sql = "INSERT INTO `signin` (`name`, `email`, `password`, `cpassword`) VALUES ('$name', '$email', '$password', '$cpassword')";
        $res = mysqli_query($conn, $sql);
        
        if ($res) {
            echo "<script>alert('Registered successfully');</script>";
            echo "<script>setTimeout(function(){ window.location.href='signup.php'; }, 1000);</script>";
            // header('Location: signup.php');
            exit;
        }
    } else {
        echo "<script>alert('Password and confirm password do not match');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <div class="wrapper">
       <h1>Register <span style="color:rgb(17, 107, 143); font-weight:bold">Form</span></h1>
      <form action='signin.php' method='post'>
        <input type="text" placeholder="Name" name="name" >
        <input type="text" placeholder="Email" name="email">
        <input type="text" placeholder="Password" name="password">
        <input type="text" placeholder="Confirm Password" name="cpassword" >
        <button type="submit">Register</button>
         <p style="margin-top:0.5rem;">Already a member?<a href="signup.php" style="color:rgb(17, 107, 143); font-weight:bold"> Login here</a></p>
    </form>
    </div>
</body>
</html>