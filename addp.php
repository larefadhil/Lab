<html>
<head>

    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <?php
    include 'includes/database.php';
    include 'includes/bootstrab.css.php';
    session_start();
    $id=$_SESSION['user'];
    $name=$_SESSION['name'];

    ?>

</head>


<body>



<div class="container">
    <div class="login-page">
        <div class="form">
            <h1> Adding New Patient </h1>
            <form class="form" action="" method="post">
                <input type="text" placeholder="Patient Name:" name="fullname">
                <input type="text" placeholder="Age:" name="age" style="width:100px">
                <select name="gender" >
                    <option>Male</option>
                    <option>Female</option>
                </select>

                <input type="text" placeholder="Price:" name="price">



                <a href="menu.php"><input type="button" value="Exit" style="text-align: center;  background-color: red; color: white ;font-size: 150%; margin-left: 100px; width: 150px; "></a>
                <button name="submitbtn" id="standard-select" >Add</button>


            </form>

        </div>
    </div>




</div>
<?php

if(isset($_POST['submitbtn'])){
    $client_name=$_POST['client_name'];
    $doctor_name=$_POST['doctor_name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $price=$_POST['price'];

    $mysql_date_now = date("Y-m-d");


    $query_insert="INSERT into purchases  (p_id,client_name,date,user_id,username,doctorname,age,gender,price) values ('Null','$client_name','$mysql_date_now','$id','$name','$doctor_name','$age','$gender','$price')";

    if(mysqli_query($db,$query_insert)){



        $se="
    SELECT p_id 
FROM purchases 
WHERE p_id=(
    SELECT max(p_id) FROM purchases
    )";

        $see=mysqli_query($db,$se);
        $seer=mysqli_fetch_array($see);

        $_SESSION['p_id']=$seer['p_id'];
        $_SESSION['pname']=$_POST['client_name'];
        $_SESSION['doctor_name']=$_POST['doctor_name'];
        $_SESSION['age']=$_POST['age'];
        $_SESSION['gender']=$_POST['gender'];
// echo $_SESSION['p_id'];
        header('location:item.php') ;
    }
    else{
        echo "<script>alert('fail')</script>";
    }

}

?>



<style type="text/css">
    body{
        align-items: center;
        background-color:#d6e4ff;
        display: flex;
        justify-content: center;
        height: 100vh;
    }

    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        font-size: 150%;

    }
    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #1abc9c;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 150%;

        cursor: pointer;
        margin-top: 5%;

    }
    .form button:hover,.form button:active,.form button:focus {
        background: #0E6050;
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }
    .form .register-form {
        display: none;
    }

    body{
        font-family: 'Roboto', sans-serif;
    }
    select {
        appearance: none;
        background-color: lightgray;
        border: none;
        padding: 0 1em 0 0;
        margin-top: 10px;
        font-family: inherit;
        font-size: inherit;
        cursor: inherit;
        line-height: inherit;
        font-size: 170%;

    }
    label{
        font-size: 150%;
    }

</style>







</body>



</html>