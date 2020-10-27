<?php 
include('config.php');
$id = $_GET['ID'];
$sql = "SELECT IMAGE FROM carousel WHERE ID ={$id}";
$result = mysqli_query($conn, $sql) or die("Select query not running");
$row = mysqli_fetch_assoc($result);
unlink("images/carousel/".$row['IMAGE']) or die("unlink query not running");

$sql1 = "DELETE FROM carousel WHERE ID = {$id}";
$result1 = mysqli_query($conn, $sql1) or die("Delete query not running");
header("location: carousel.php");


?>