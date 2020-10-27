<?php
  include('config.php');
  $id = $_GET['ID'];
  $sql = "DELETE FROM aboutinfo WHERE ID = {$id}";
  mysqli_query($conn,$sql) or die("query not running");
  header('location: about.php');
?>