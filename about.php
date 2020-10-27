<?php
include('config.php');
session_start();
if(!isset($_SESSION['USERNAME'])) {
     header('location: index.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
	 .btn {
		float:right;
                margin-right:35px; 
                margin-top: 10px;
	 }
         .container-fluid {
                  padding-bottom: 50px;
         }
	 table {
		 height:auto;
		 width:100%;
		 
	 }
	 th  {
		 padding:5px 0px;
		 text-align:center;
		 border: 1px black solid;
		 background-color:#0c3;
		 text-transform:uppercase;
	 }
	 tr {
		 text-align:center;
	 }
	 td {
		 border: 1px black solid;
         padding: 5px 0px;
	    }
     .dropdown-toggle-split {
		 font-weight: 500;
         font-size: 30px;
		 padding: 7px 10;
		 text-align: center; 
	 }
         @media (max-width: 992px) {
           .btn {
		        float:right;
                margin-right:35px; 
                margin-top: 50px;
            }
	    .dropdown-toggle-split {
		 margin-top: 27px;
		 font-weight: 500;
         font-size: 30px;
		}
	    .dropdown-toggle-split:hover {
		 background-color:  #9900cc;
		 
	 }
      }
	 
        
	   
	</style>
  </head>
<body>
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
	  <li class="nav-item">
	    <div class="input-group">
		  <div class="input-group-append">
		    <a class="nav-link product-inline" href="category.php">Category</a>
			  <a class="dropdown-toggle dropdown-toggle-split product-inline" data-toggle="dropdown"></a>
			    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<?php 
		    $sql = "SELECT * FROM allcategory";
			$result = mysqli_query($conn,$sql) or die('Allcategory query not running');
			if(mysqli_num_rows($result)>0) {
				while($row = mysqli_fetch_assoc($result)) {
				
		  ?>
		   <a class="dropdown-item" href="#"><?php echo $row['CATEGORYNAME']; ?></a>
			<?php } } else {?>
			    <a class="dropdown-item" href="category-add.php">Add Category</a> 
			<?php } ?>
		         
		  </div>
		</div>
	  </li>
		  
      <li class="nav-item">
        <a class="nav-link active" href="about.php">About Us</a>
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
<!--ending of navbar -->
<div class="container-fluid" style="margin-top:90px">
   <div class="row">
     <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <h1 style="color: #0c3">About Us Image</h1>
     </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-4">
      <?php
       $sql = "SELECT * FROM aboutpic";
         $result = mysqli_query($conn, $sql) or die("Aboutpic Query Not Running");
         if(mysqli_num_rows($result)>0) {
       ?>
        <input type="hidden" onclick="window.location.href='aboutpic-add.php'" class="btn btn-success" value="Add Picture">
       <?php } else { ?>
        <input type="button" onclick="window.location.href='aboutpic-add.php'" class="btn btn-success" value="Add Picture">
       <?php } ?>
     </div>
   </div> <!-- row div -->
<table>
   <thead>
    <tr>
     <th>Id</th>
     <th>Image Name</th>
     <th>Edit</th>
     <th>Delete</th>
    </tr>
   </thead>
   <tbody>
     <?php  
          if(mysqli_num_rows($result)>0) {
             while($row = mysqli_fetch_assoc($result)) {
     ?>
     <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['IMAGE']; ?></td>
        <td><a href="aboutpic-edit.php?ID=<?php echo $row['ID'];?>">
        <i class="fa fa-pencil-alt"></i></a></td>
        <td><a href="aboutpic-delete.php?ID=<?php echo $row['ID'];?>">
        <i class="fa fa-trash-alt"></i></a></td>
     </tr>
      <?php } } ?>
   </tbody>
</table>
<br>

<div class="row">
     <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <h1 style="color: #0c3">About Us Info</h1>
     </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-4">
      <?php
       $sql4 = "SELECT * FROM aboutinfo";
         $result4 = mysqli_query($conn, $sql4) or die("Aboutinfo Query Not Running");
         if(mysqli_num_rows($result4)>0) {
       ?>
        <input type="hidden" onclick="window.location.href='aboutinfo-add.php'" class="btn btn-success" value="Add Info">
       <?php } else { ?>
        <input type="button" onclick="window.location.href='aboutinfo-add.php'" class="btn btn-success" value="Add Info">
       <?php } ?>
     </div>
   </div> <!-- row div -->
<table>
   <thead>
    <tr>
     <th>Id</th>
     <th>Visiters</th>
     <th>Products</th>
     <th>Brands</th>
     <th>Edit</th>
     <th>Delete</th>
    </tr>
   </thead>
   <tbody>
     <?php  
          if(mysqli_num_rows($result4)>0) {
             while($row4 = mysqli_fetch_assoc($result4)) {
     ?>
     <tr>
        <td><?php echo $row4['ID']; ?></td>
        <td><?php echo $row4['VISITERS']; ?></td>
        <td><?php echo $row4['PRODUCTS']; ?></td>
        <td><?php echo $row4['BRANDS']; ?></td>
        <td><a href="aboutinfo-edit.php?ID=<?php echo $row4['ID'];?>">
        <i class="fa fa-pencil-alt"></i></a></td>
        <td><a href="aboutinfo-delete.php?ID=<?php echo $row4['ID'];?>">
        <i class="fa fa-trash-alt"></i></a></td>
     </tr>
      <?php } } ?>
   </tbody>
</table>
<br>

<div class="row">
     <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <h1 style="color: #0c3">About Us List</h1>
     </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        <input type="button" onclick="window.location.href='aboutlist-add.php'" class="btn btn-success" value="Add List">
     </div>
   </div> <!-- row div -->
<table>
   <thead>
    <tr>
     <th>Id</th>
     <th>List</th>
     <th>Edit</th>
     <th>Delete</th>
    </tr>
   </thead>
   <tbody>
     <?php  
         $sql1 = "SELECT * FROM aboutlist";
         $result1 = mysqli_query($conn, $sql1) or die("Aboutlist Query Not Running");
         if(mysqli_num_rows($result1)>0) {
             while($row1 = mysqli_fetch_assoc($result1)) {
     ?>
     <tr>
        <td><?php echo $row1['ID']; ?></td>
        <td><?php echo $row1['LIST']; ?></td>
        <td><a href="aboutlist-edit.php?ID=<?php echo $row1['ID'];?>">
        <i class="fa fa-pencil-alt"></i></a></td>
        <td><a href="aboutlist-delete.php?ID=<?php echo $row1['ID'];?>">
        <i class="fa fa-trash-alt"></i></a></td>
     </tr>
      <?php } }?>
   </tbody>
</table>
<br>

<div class="row">
     <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <h1 style="color: #0c3">Our Team Card's</h1>
     </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        <input type="button" onclick="window.location.href='team-add.php'" class="btn btn-success" value="Add Team Card">
     </div>
   </div> <!-- row div -->
<table>
   <thead>
    <tr>
     <th>Id</th>
     <th>Image</th>
     <th>Name</th>
     <th>Description</th>
     <th>Edit</th>
     <th>Delete</th>
    </tr>
   </thead>
   <tbody>
     <?php  
         $sql2 = "SELECT * FROM team";
         $result2 = mysqli_query($conn, $sql2) or die("Team Query Not Running");
         if(mysqli_num_rows($result2)>0) {
             while($row2 = mysqli_fetch_assoc($result2)) {
     ?>
     <tr>
        <td><?php echo $row2['ID']; ?></td>
        <td><?php echo $row2['IMAGE']; ?></td>
        <td><?php echo $row2['TITLE']; ?></td>
        <td><?php echo $row2['DESCRIPTION']; ?></td>
        <td><a href="team-edit.php?ID=<?php echo $row2['ID'];?>">
        <i class="fa fa-pencil-alt"></i></a></td>
        <td><a href="team-delete.php?ID=<?php echo $row2['ID'];?>">
        <i class="fa fa-trash-alt"></i></a></td>
     </tr>
      <?php } }?>
   </tbody>
</table>
</div><!--container-fluid div -->
   
</body>
</html>