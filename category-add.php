<?php
include('config.php');
session_start();
if(!isset($_SESSION['USERNAME'])) {
     header('location: index.php');
  }
if(isset($_POST['add']))  {
	$name = strtolower($_POST['CATEGORYNAME']);
	$sql = "INSERT INTO allcategory(CATEGORYNAME) VALUES('{$name}')";
	mysqli_query($conn,$sql) or die('Insert query not running');
	
	$sql1 = "CREATE TABLE $name(ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, IMAGE VARCHAR(50) NOT NULL, TITLE VARCHAR(200) NOT NULL, PRICE VARCHAR(20) NOT NULL, DISCOUNT VARCHAR(20), COLOR VARCHAR(15) NOT NULL, QUANTITY VARCHAR(15) NOT NULL, BRAND VARCHAR(50) NOT NULL, DELIVERY VARCHAR(10) NOT NULL, RETURNABLE VARCHAR(5) NOT NULL)";
	mysqli_query($conn,$sql1) or die('create table query not running');
	header('location: category.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="icon" href="images/logo.jpg"> 
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="mycss/file.css">
    <link rel="stylesheet" type="text/css" href="navbarcss.css">
    <script src="myjquery/jqueryfirst.js" type="text/javascript"></script>
    <script src="myjquery/secondproper.js" type="text/javascript"></script>
    <script src="myjquery/thirdbootstrap.js" type="text/javascript"></script>
    
    <style type="text/css">
	 body {
		 padding:0;
		 margin:0;
	 }
	 .container {
		 margin-top:88px;
         max-width: 600px;
         width: auto;
         height:auto;
         padding: 15px 20px; 
	 }
	 h1 {
		 color: #0c3;
	 }
	 .btn {
		 padding: 10px 30px;
	 }
        
	   
	</style>
  </head>
<body class="bg-light">
   <!-- starting of navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <img class="navbar-brand" src="images/logo.jpg" alt="logo" style="width:7vh; height:7svh">
  <h4 class="navbar-brand" style="margin-top:6px;color:#0c3; font-size: 33px">
  Aggrawal's
  </h4>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="carousel.php">Carousel</a>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
		 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <?php 
		    $sql = "SELECT * FROM allcategory";
			$result = mysqli_query($conn,$sql) or die('Allcategory query not running');
			if(mysqli_num_rows($result)>0) {
				while($row = mysqli_fetch_assoc($result)) {
				
		  ?>
		   <a class="dropdown-item" href="#"><?php echo $row['CATEGORYNAME']; ?></a>
			<?php } } else {?>
			    <a class="dropdown-item active" href="category-add.php">Add Category</a> 
			<?php } ?>
		 </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="users.php">Users</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="feedback.php">Feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      </ul>
  </div>
</nav>
  <!-- ending of navbar -->
  <div class="container bg-light">
    <h1>Add New Category Name</h1>
      <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
	     <div class="form-group">
		   <label>Category Name *</label>
		   <input type="text" class="form-control" placeholder="Name" name="CATEGORYNAME" required>
		 </div>
		 <input type="submit" class="btn btn-success" value="Add" name="add">
	  </form>
  </div>
</body>
</html>