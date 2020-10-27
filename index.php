<?php
include('config.php');

if(isset($_POST['login'])) {
   $email = $_POST['EMAIL'];
   $password = $_POST['PASSWORD'];

   $sql = "SELECT * FROM adminuser WHERE EMAIL = '{$email}' && PASSWORD = '{$password}'";
   $result = mysqli_query($conn, $sql) or die("Query not running");
   if(mysqli_num_rows($result)>0) {
       while($row = mysqli_fetch_assoc($result)) {
               session_start();
               $_SESSION['USERNAME'] = $row['USERNAME'];
           }
            header('location: home.php');
      } else{
          echo '<script type="text/javascript">
            alert("Username or Password is Incorrect");
            window.location = "index.php"
          </script>';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="images/logo.jpg"> 
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="mycss/file.css">
    <script src="myjquery/jqueryfirst.js" type="text/javascript"></script>
    <script src="myjquery/secondproper.js" type="text/javascript"></script>
    <script src="myjquery/thirdbootstrap.js" type="text/javascript"></script>
       <style type="text/css">
          body {
             margin: 0;
             padding: 0;
           }
          .container {
             width: auto;
             max-width: 600px;
             height: auto;
             padding: 15px 10px;
             margin: auto;
           }
       </style>
   </head>
    
<body class="#6c757d">
   <div class="container bg-light">
       <h1 align="center" style="color:#0c3">Admin Panel Login</h1>
         <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <label>Email *</label>
              <input type="email" class="form-control" name="EMAIL" placeholder="eg: abc@gmail.com" required>
            </div>
             
             <div class="form-group">
              <label>Password *</label>
              <input type="Password" class="form-control" name="PASSWORD" placeholder="password" required>
            </div>
            
            <input type="submit" class="btn btn-success" name="login" value="Login">
         </form>
   </div> <!-- container div -->
</body>
</html>