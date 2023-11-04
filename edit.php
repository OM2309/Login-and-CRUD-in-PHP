<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $id = $_GET['id']; // Get the 'id' parameter from the URL
        $sql = "UPDATE `signin` SET `name`='$name', `email`='$email', `password`='$password' WHERE `id` = '$id'";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo "<script>alert('Updated successfully');</script>";
            echo "<script>setTimeout(function(){ window.location.href='index.php'; }, 1000);</script>";
            // You can redirect to another page or do something else here if needed.
        } else {
            echo "<script>alert('Update failed');</script>";
        }
    } else {
        echo "<script>alert('Password and confirm password do not match');</script>";
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM `signin` WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Populate the input fields with the retrieved data
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];
$cpassword = $row['password'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
       <h1>Update</h1>
      <form action='edit.php?id=<?php echo $id; ?>' method='post'> 
        <input type="text" placeholder="Name" name="name" value="<?php echo $name; ?>" >
        <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>">
        <input type="text" placeholder="Password" name="password" value="<?php echo $password; ?>">
        <input type="text" placeholder="Confirm Password" name="cpassword" value="<?php echo $cpassword; ?>">
        <button type="submit">Update</button>
      </form>
    </div>
</body>
</html>
