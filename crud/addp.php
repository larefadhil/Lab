<?php


include'../includes/database.php';
session_start();



if(isset($_POST['submit'])){


    $id_test=time();
    $_SESSION['id_test']=$id_test;
    $fullname=$_POST['fullname'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $price=$_POST['price'];
    $date_now = date("Y-m-d");

    $sql="INSERT INTO Patient (id_p, id_test, fullname , age , gender, price, datee )VALUES (NULL, '$id_test','$fullname','$age','$gender', '$price','$date_now')";
    if (mysqli_query($db,$sql)){
        echo "done";
        $_SESSION['id_test'] = $id_test;
        $_SESSION['fullname'] = $fullname;
         $_SESSION['$age'] = $age;
         $_SESSION['$gender'] = $gender;
         $_SESSION['$price'] = $price;
         $_SESSION['date_now'] = $date_now;
         header('location:../p.php');

    }
    else{
        echo "eror";
    }



}


?>
