<?php
include "includes/database.php";
?>
 


<?php
$Err="";
$Err2="";
$Err3="";
if(isset($_POST['submit'])){

    if  ( empty($_POST['username']) ){
        $Err="name is required";
        }
    if( empty($_POST['password'] )){
        $Err2="password is required";
    }
else {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query =mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");



if (mysqli_num_rows($query) > 0) {

  while( $row = mysqli_fetch_assoc($query)){

    
        header("Location: admin.php");
}}
 else {
   $Err3="incorrect inputs";
  
   
}
 
 
}
}
   
?>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
   
   
</head>
<body>

<div class="container c">


<form method="POST" class="loginform" style=" border-radius: 25px;">
<h1 style="text-align:center; color:white" class="m-4 p-4">Login</h1>
    <div style="text-align : center">
    <i class="fa fa-sign-in fa-2x" style="color:#08d" ></i>
    </div>


<div class="form-group ">
<label style="color:white" >Username</label>
<input type="text" class="form-control"  placeholder="Enter username"  name="username" style="background-color">
* <?php echo "<p style='color:red;'>" . $Err . "</p>"; ?>

</div>

<div class="form-group">
<label >Password</label>

<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">  
* <?php echo "<p style='color:red;'>" . $Err2 . "</p>"; ?> 
* <?php echo "<p style='color:red;'>" . $Err3 . "</p>"; ?>
</div>

<div class="row justify-content-center">
<button type="submit" style="background-color:#FBBC05"  class="btn" name="submit" >Login</button>
</div>
</form>

</div>
</div>
</div>
</body>
</html>
<style>
   <?php 
   include "includes/style.css"; 
   ?>
 </style>
