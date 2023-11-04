<?php
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    if ($password == $cpassword) {
        $sql = "INSERT INTO `signin` (`name`, `email`, `password`, `cpassword`, `course`) VALUES ('$name', '$email', '$password', '$cpassword', '$course')";
        $res = mysqli_query($conn, $sql);
        
        if ($res) {
            echo "<script>alert('Registered successfully');</script>";
            echo "<script>setTimeout(function () { window.location.href = 'signup.php'; }, 1000);</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <div class="wrapper">
        <h1>Register <span style="color:rgb(17, 107, 143); font-weight:bold">Form</span></h1>
        <form action='signin.php' method='post'>
            <div class="input-container">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="name" id="name">
            </div>

            <select name="course" class="form-control">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <div class="input-container">
            <i class="fa-solid fa-lock"></i>
            <input type="text" name="password">
            </div>
       
            <input type="text" placeholder="Confirm Password" name="cpassword">
            <button type="submit">Register</button>
            <p style="margin-top:0.5rem;">Already a member?<a href="signup.php"
                    style="color:rgb(17, 107, 143); font-weight:bold"> Login here</a></p>
        </form>
    </div>
</body>

</html>