<!DOCTYPE html>
<?php
session_start();


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container flex items-center justify-around py-8 bg-[#dfe9f5] font-medium">
    <div class="left">
           <?php echo $_SESSION['name'];?>
    </div>
    <div class="middle">
        <ul class="cursor-pointer">
            <a class="px-2" href="/">Home</a>
            <a class="px-2" href="signin.php">Register</a>
            <a class="px-2" href="signup.php">Login </a>
        </ul>
    </div>
    <div class="right">
        <a href="logout.php">Logout</a>
    </div>
  </div>
</body>
</html>