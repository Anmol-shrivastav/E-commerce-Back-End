<?php
include('config.php');
$id = $_GET['ID'];
$categoryname = strtolower($_GET['CATEGORYNAME']);

$sql = "SELECT IMAGE FROM $categoryname";
$result = mysqli_query($conn,$sql) or die("SELECT query not running");
if(mysqli_num_rows($result)>0) {
	while($row = mysqli_fetch_assoc($result)) {
		unlink("images/product/".$row['IMAGE']);
	}
}
$sql1 = "DROP TABLE $categoryname";
mysqli_query($conn,$sql1) or die("Delete table query not running");

$sql2 = "DELETE FROM allcategory WHERE ID = {$id}";
$result2 = mysqli_query($conn,$sql2) or die("Delete row query not running");

header('location: category.php');
?>