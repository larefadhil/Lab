<html>
<head>

    <?php
    include "includes/database.php";
    include "crud/addp.php";

    ?>
</head>

<body>
<?php
$se="
    SELECT id_p 
FROM Patient 
WHERE id_p=(
    SELECT max(id_p) FROM Patient
    )";

$see=mysqli_query($db,$se);
$seer=mysqli_fetch_array($see);
$id= $seer['id_p']+1;

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="header">
    <h1 style="text-align: center">Adding new Patient</h1>
</div>
<div class="container" style="padding-top: 100px ; width: 50%">
<form action="crud/addp.php" method="post">
    <h2 >Patient Id : <?php echo $id?></h2>
        <div class="form-group ">
            <label for="fullname">Fullname</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" required>
        </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="age">Age</label>
            <input type="text" class="form-control" id="age" placeholder="Age" name="age" required>
        </div>

        <div class="form-group col-md-4">
            <label for="gender">Gender</label>
            <select id="gender" class="form-control" name="gender" required>
                <option selected>Choose...</option>
                <option>Female</option>
                <option>Male</option>
                <option>Others</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="price" required>
        </div>
    </div>

    <button type="submit" class="btn btn-success" name="submit" style="width: 100%">Add</button>
</form>
<div class="print-container">
    <hr>
    <?php

    echo "Neme: ";
    echo $_SESSION['fullname'];
    echo "<br>";

    echo "Your code: ";
    echo $_SESSION['id_test'] ;
    echo "<br>";

    echo $_SESSION['date'];
    echo "Please visit: ";
    echo "www.lab.com";

    ?>
    <hr>

</div>
    <button type="submit" class="btn btn-info" onclick="window.print()" style="width: 100%">Print</button>

</div>

<style>

    @media print {
        /*.body {*/
        /*    visibility: hidden;*/
        /*}*/
        /*.form{*/
        /*    visibility: hidden ;*/
        /*}*/
        .print-container, .print-contaner * {
            visibility: visible;
            position: absolute;
            top: 0;
            left: 0;
        }
        .container{
            visibility: hidden;
        }
        .header{
            visibility: hidden;

        }
    }


</style>
</body>



</html>