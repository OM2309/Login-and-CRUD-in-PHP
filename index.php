<!DOCTYPE html>
<?php
include 'connection.php';
session_start();



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

      table,th,td{
        border:1px solid black;
        padding:15px;
      }
      th{
        background-color:#dfe9f5;
      }
      </style>
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


  <div class="container flex items-center justify-center h-screen ">
  <div class="shadow-lg max-w-2xl p-8 ">
    <h1 class="font-bold text-lg">Table</h1>
    <table >
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $count = 1;
        $sql = "SELECT * FROM signin";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { // Use mysqli_fetch_assoc to fetch rows as an associative array.
        ?>
          <tr>
            <td><?php echo $count++ ?></td>
            <td><?php echo $row['name']; ?></td> 
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td>
    <a href="#" class="text-blue-600 hover:underline font-medium">Edit</a>
    <a href="delete.php?id=<?php echo ($row['id']); ?>" class="text-red-600 hover:underline font-medium">Delete</a>
  </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    </div>
  </div>
</body>
</html>