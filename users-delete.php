<?php 
include('config.php');
$id = $_GET['ID'];
$sql = "DELETE FROM normaluser WHERE ID = {$id}";
mysqli_query($conn,$sql) or die("Delete query not running");
header('location: users.php'); 
?>