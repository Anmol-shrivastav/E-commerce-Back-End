<?php
include('config.php');
session_start();
if(!isset($_SESSION['USERNAME'])) {
     header('location: index.php');
  }
$categoryname = strtolower($_GET['CATEGORYNAME']);
if(isset($_POST['ADD'])) {
    $error = array();
	
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$file_type = $_FILES['image']['type'];
	$file_ext = end(explode('.',$file_name));
	$extension = array("jpeg","jpg","png");
	
	if(in_array($file_ext,$extension) === false)  {
		$error[] = "This file extension is not valid, please upload jpg or png file";
	}
	if($file_size>9097152)  {
	    $error[] = "File size must be 9mb or Lower";
	}
	if(empty($error)=== true)  {
	    move_uploaded_file($file_tmp,"images/product/".$file_name);	
	}  else {
		echo"<pre>";
		echo"print_r($error)";
		echo"</pre>";
		die();
	}
       $name = $_POST['NAME'];
       $price = $_POST['PRICE'];
	   $discount = $_POST['DISCOUNT'];
	   $color = $_POST['COLOR'];
	   $quantity = $_POST['QUANTITY'];
	   $brand = $_POST['BRAND'];
	   $delivery = $_POST['DELIVERY'];
	   $returnable = $_POST['RETURNABLE'];
	   
	   if(!empty ($discount) && $price>$discount) {
		   echo '<script>alert("Discount Price must be greater than the actual price");
		         window.location="category.php"</script>';
	   } else {
       
       $sql = "INSERT INTO $categoryname(IMAGE,TITLE,PRICE,DISCOUNT,COLOR,QUANTITY,BRAND,DELIVERY,RETURNABLE) values('{$file_name}','{$name}','{$price}','{$discount}','{$color}','{$quantity}','{$brand}','{$delivery}','{$returnable}')";
       mysqli_query($conn, $sql) or die("Insert Query not running");
       header('location: category.php');
	   }

 }
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo 'Add-'.$categoryname.'-Card'?></title>
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
        .container-fluid {
                 margin-top:88px;
                 max-width: 600px;
                 width: auto;
                 height:auto;
                 padding: 15px 20px;
       
             }   
        .btn {
            padding: 5px 30px;
        }
        .product-inline {
		    display: inline-block;
	    }
	    .dropdown-toggle-split {
		    font-weight: 500;
            font-size: 30px;
		    padding: 7px 10;
		    text-align: center; 
	    } 
		.common {
			display: inline-block;
		}
		.product-card {
			max-width: 50%;
        @media (max-width: 992px) {
			 
		    .dropdown-toggle-split {
		        margin-top: 27px;
		        font-weight: 500;
                font-size: 30px;
		    }
	        .dropdown-toggle-split:hover {
		        background-color:  #9900cc;
	        }
		    .btn {
		        float:right;
                margin-right:25px; 
                margin-top: 30px;
            }
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
	  <li class="nav-item">
	    <div class="input-group">
		  <div class="input-group-append">
		    <a class="nav-link product-inline" href="category.php">Category</a>
			  <a class="dropdown-toggle dropdown-toggle-split product-inline active" data-toggle="dropdown"></a>
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
<!--ending of navbar -->

  <div class="container-fluid">
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	  <div class="row">
	    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
		  <h1 style="color:#0c3">Add <?php echo $categoryname; ?> Card</h1>
           <div class="form-group">
             <label>Image Of Product *</label>
             <input type="file" class="form-control-file" name="image" required>
           </div>
	   
	       <div class="form-group">
             <label>Name *</label>
             <input type="text" class="form-control" name="NAME" placeholder="Name of the product" required>
           </div> 
           <div class="form-group">
             <label>Price *</label>
             <input type="number" class="form-control" name="PRICE" placeholder="Product price" required>
           </div>
           <div class="form-group">
             <label>Discount price </label>
             <input type="number" class="form-control" name="DISCOUNT" placeholder="Discount Price">
           </div>   
      </div> <!-- col-lg-6 -->
	  
	  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
	      <h1 style="color:#0c3;">Product Description</h1>
	       <div class="form-group">
		     <label>Color *</label>
			 <input type="text" class="form-control" name="COLOR" placeholder="Color of the product" required>
		   </div>
		   <div class="form-group">
		     <label>Net. Quantity *</label>
			 <input type="text" class="form-control" name="QUANTITY" placeholder="Quantity of the product" required>
		   </div>
		   <div class="form-group">
		     <label>Brand *</label>
			 <input type="text" class="form-control" name="BRAND" placeholder="Brand name of the product" required>
		   </div>
		   <div class="form-group">
		     <label>Delivery Charge *</label>
			 <input type="number" class="form-control" name="DELIVERY" placeholder="Delivery Charge" required>
		   </div>
	  </div>
	  
	 </div> <!-- row div -->
	 <div class="form-group">
		<label>Returnable/Non-Returnable *</label>
		<select style="width: 100%; height:5vh;" name="RETURNABLE" required>
		    <option disabled selected value="">Select</option>
		    <option value="Yes">Yes</option>
			<option value="No">No</option>
		</select>
	 </div>
       <input type="submit" class="btn btn-success" value="Add" name="ADD">
     </form>
  </div>
</body>
</html>