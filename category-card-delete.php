<?php
include('config.php');
$id = $_GET['ID'];
$categoryname = $_GET['CATEGORYNAME'];
$sql = "SELECT IMAGE FROM $categoryname WHERE ID = {$id}";
$result = mysqli_query($conn,$sql) or die("SELECT query not running");
$row = mysqli_fetch_assoc($result);
unlink("images/product/".$row['IMAGE']);
$sql1 = "DELETE FROM $categoryname WHERE ID = {$id}";
mysqli_query($conn,$sql1) or die("DELETE query not running");
header('location: category.php');
?>