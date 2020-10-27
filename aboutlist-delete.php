<?php 
include('config.php');
$id = $_GET['ID'];
$sql = "DELETE FROM aboutlist WHERE ID = {$id}";
mysqli_query($conn, $sql) or die("Delete query not running");
header('location: about.php');
?>