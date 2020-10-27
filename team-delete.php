<?php 
$id = $_GET['ID'];
include('config.php');
$sql1 = "SELECT * FROM team WHERE ID = {$id}";
$result = mysqli_query($conn,$sql1) or die("Select Query not running");
$row = mysqli_fetch_assoc($result);
unlink("images/about/team/".$row['IMAGE']);
$sql = "DELETE FROM team WHERE ID ={$id}";
mysqli_query($conn,$sql) or die("Query not running");
header('location: about.php');
?>
