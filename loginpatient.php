<?php 
include 'includes/database.php';

?>


<?php 
$Err="";
if(isset($_POST['submit'])){

if(empty($_POST['serial'])){
$Err="serial code is required";
}
else {
$serial= $_POST['serial'];
$query =mysqli_query($db, "SELECT * FROM patient WHERE s_n='$serial' ");




if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)){
        $_SESSION['serialcode']=$row['s_n'];
        header("Location: patient.php");
}}
    else {
        $Err="incorrect inputs";
       
        
     }
  
}}
?>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
</head>
<body>

<div class="container">


<form method="POST"  class="loginform"  style="border-radius: 25px;" >
<h1 style="text-align:center; color:white;" class="m-4 p-4">Patient</h1>
<div class="form-group styleform">
<label style="color:white;" >Please Enter your Code</label>
<input type="text" class="form-control"  placeholder="Enter code" name="serial">


<button type="submit" style="background-color:#FBBC05"  class="btn my-2" name="submit">Enter</button> 
<br>
 <?php echo "<p style='color:red;'>" . $Err . "</p>"; ?>
</form>
</div>

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