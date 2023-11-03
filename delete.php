<?php
include 'connection.php';
$ids = $_GET['id'];

$sql = "DELETE FROM `signin` WHERE `id` = $ids";
$res = mysqli_query($conn,$sql);
header("Location:index.php");
?>