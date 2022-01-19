<html>
  <head>

  <?php
    include "includes/database.php";

  session_start();
  $code=$_SESSION['code'];
 

  ?>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="menu.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  </head>
      
      
  <body >






  <div class="modal fade bd-example-modal-lg" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="editbtn">Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- HERE GOES THE FORMMMM MODAL-->

            <form action="" method="POST" enctype="multipart/form-data">
              <div class="modal-body">

                <div class="form-group">
<input type="hidden" name="update_id" id="update_id">
                  <input class="form-control input100" type="text" name="resulttest" id="resulttest" placeholder="Reasult" required>

                </div>

                  <div class="form-group col-md-3">
                    <select name="pn" id="pn" class="form-control input100">
                      <option checked></option>
                      <option>Positive</option>
                      <option>Negative</option>
                    </select>
                  </div>

              </div>

              <div class="modal-footer">
                <button type="submit" name="updatedata" class="btn btn-primary">Done</button>
              </div>
            </form>
          </div>

        </div>
      </div>











  <?php
      
      if(isset($_POST['submitbtn'])){
          $resulttest=$_POST['resulttest'];
          $item_name=$_POST['item_name'];
          $pn=$_POST['pn'];

          
          
          $query_insert="INSERT into purchases_items (p_id,item_name,result,Lownormal,highnormal,client_name,yaka,pn) values ('$p_id','$item_name','$resulttest','0','0','$pname','0','$pn')";
      $q_price="UPDATE purchases_items
          INNER JOIN items  
              ON purchases_items.item_name=items.item_name
  SET purchases_items.highnormal=items.highnormal
  WHERE purchases_items.item_name=items.item_name ";

  // $q_pricet="UPDATE purchases_items
  //         SET total_item
  //              purchases_items.total_item=purchases_items.sell_price+purchases_items.count";
      
  // $sqll = "SELECT (items.sell_price*purchases_items.sold_count) as totalitem FROM items join purchases_items where  items.item_name=purchases_items.item_name";
  // $tl = mysqli_query($conn,$sqll);
  // $result = mysqli_fetch_array($tl);
  

  $q_priceee="UPDATE purchases_items
          INNER JOIN items  
              ON purchases_items.item_name=items.item_name
  SET purchases_items.Lownormal=items.Lownormal
  WHERE purchases_items.item_name=items.item_name ";


  $q_pricee="UPDATE purchases_items
          INNER JOIN items  
              ON purchases_items.item_name=items.item_name
  SET purchases_items.yaka=items.yaka
  WHERE purchases_items.item_name=items.item_name ";


    if(mysqli_query($conn,$query_insert)){
    if(mysqli_query($conn,$q_price)){
    // if(mysqli_query($conn,$q_pricet)){}
          if(mysqli_query($conn,$q_pricee)){}
          if(mysqli_query($conn,$q_priceee)){}

  // if ($result) {
  //          $totalitem=$result['totalitem'];
  // }

  

  // $queryttl="UPDATE items join purchases_items set total_item = '$totalitem' WHERE items.item_name=purchases_items.item_name";
  //    if(mysqli_query($conn,$queryttl)){}







  }

      }
      else{
        echo "<script>alert('fail')</script>";
      }
          
      }
          
      ?>
      
  <?php

  // mysql select query
  $query = "SELECT * FROM `items`";



  // for method 2

  $result2 = mysqli_query($conn, $query);

  $options = "";

  while($row2 = mysqli_fetch_array($result2))
  {
      $options = $options."<option>$row2[0]  </option>";
  $_SESSION['price']=$row2[2];
  }

  ?>
  <div class="container" >
  <div class="login-page>
    <div class="form">  
  <form class="form" action="" method="post">
    <select name="item_name" style="font-size: 100%;">
              <?php echo $options;?>
          </select>
          <input type="text" name="resulttest" placeholder="Result" style="width: 200px; font-size: 100%;" >
          <select name="pn" style="width: 200px; font-size: 100%;">
  <option> </option> 
  <option>Positive</option>        
  <option>Negative</option>        
  </select>
  <button name="submitbtn" id="standard-select" style="margin-right: 100px; font-size: 100%;" >Add</button>
  


  
    <button onClick="window.print()" style="font-size:100%">Print this page
  </button>
  
  
    <a href="sale.php?logout" ><input type="button" value="New" style="text-align: center;  margin-left: 20px; background-color: yellowgreen; color: white; font-size: 100%;"></a> 
    
      
    <a href="adminlog.php?logout"><input type="button" value="Exit" style="text-align: center; margin-left: 20px; background-color: red; color: white ;font-size: 100%; "></a> 
    
      


  </form>

      </div>
      </div>
  <div class="print-container"></div>
  <div class="container" >

      <div class="row">
        <div class="col-md-12">

              <pre><p  style="font-size: 150%;"><strong><?php $Color = "red"; echo '<pre style="Color:'.$Color.';">'.      "     Name: ".$pname.'</pre>';?>
      Gender: <?php echo $gender ;?> 
      ID: <?php echo $p_id ;?>   
      <?php echo "Date:" . date("Y-m-d");?>  </strong></p></pre>
  <h6 style="background-color: yellow; text-align: center;">Results</h6>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table  data-row-style="rowStyle" class="table table- table-hover thead-dark thead-inverse" >
                  <thead>
                                  <tr>
                        <td class="text-left" style="width:150px"><strong>Test</strong></td>

                        <td style="text-align: right; padding-left: 0px;" ><strong>Results</strong></td>
                      
                        <td style="width:150px">  </td>

                          <td class="text-left" ><strong>Normal Range</strong></td>

                                  </tr>
                  <tbody>
                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                    <tr>
                      
      <?php

      
          // $count =0;
          $q ="SELECT * FROM purchases_items where  '$p_id'= p_id ";
          // $q1 ="SELECT sell_price FROM items where  item_name='$item_name'  ";
          
          $r = mysqli_query($conn,$q);
          // $r1 = mysqli_query($conn,$q1);
          while($row = mysqli_fetch_array($r)){ 
          if (($row[5]>$row[3] AND $row[5]<$row[4]) OR $row[5]==0 ) {
            if ($row[3]==0 AND $row[4]==0) {
  echo '
            
          <tr>
          <td class=" text-left">' .$row[2].'</td>
          <td class=" text-center " style= text-align:center;">' .$row[5].'</td>
          <td class=" text-center" style="text-align:center;">'.$row[7].'</td>
          <td class=" text-left">' .$row[6] .'</td>
        
  '.'</tr>';
            }
            else{
              echo '
            
          <tr>
          <td class=" text-left">' .$row[2].'</td>
          <td class=" text-center " style= text-align:right;">' .$row[5].'</td>
          <td class=" text-left" style="text-align:right;">'.$row[7].'</td>
          <td class=" text-left">' .$row[3],' - ',$row[4],' ',$row[6] .'</td>
          <td class=" text-left"> <a href="delete.php?delete='. $row['i'].'" class="btn btn-danger deletebtn">Delete</a></td>
        
  '.'</tr>';
  } }
  else{       
          
  echo '
          <tr>
          <td class=" text-left">' .$row[2] .'</td>
          <td class=" text-center" style="color:red; text-align:right;">' .$row[5].'</td>
          <td class=" text-left" style="text-align:right;">'.$row[7].'</td>
          <td class=" text-left ">' .$row[3],' - ',$row[4],' ',$row[6] .'</td>
          <td class=" text-left"> <a href="delete.php?delete='. $row['i'].'" class="btn btn-danger deletebtn">Delete</a></td>
        

  ';

  }}
    

      ?>
    </tr>
                  
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
      
  

      
      </div>  
      
      
      </div>




      <script src="js/jquery.min.js"></script>
          <script src="js/bootstrap.bundle.min.js"></script> <!-- Menu Toggle Script -->
          <script>
            $(function(){
              $("#menu-toggle").click(function(e) {
                  e.preventDefault();
                  $("#wrapper").toggleClass("toggled");
              });

              $(window).resize(function(e) {
                if($(window).width()<=768){
                  $("#wrapper").removeClass("toggled");
                }else{
                  $("#wrapper").addClass("toggled");
                }
              });
            });
            
          </script>





  <style type="text/css">
  @media print {
    .body {
  visibility: hidden;
  }
    .form{
      visibility: hidden ;
    }
    .print-container, .print-contaner * {
      visibility: visible;
          position: absolute;
      top: 0;
      left: 0;
    }
    .deletebtn{
      visibility: hidden ;

    }


  }
      @import url(https://fonts.googleapis.com/css?family=Roboto:300);

  .invoice-title h2, .invoice-title h3 {
      display: inline-block
    }

  .table > tbody > tr > .no-line {
    border-top: none;

  }
  tr>td {
    padding-bottom: 1em;}
  .table > thead > tr > .no-line {
      border-bottom: none;
  }   

  .table > tbody > tr > .thick-line {
      /* border-top: 2px solid; */
      

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
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 150%;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
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
        font-size: 150%;


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

  th, td {
    border-bottom: 2px solid #ddd;
    padding-right: 50px;
  }
  table{
  padding-left: 50px;
  font-size: 80%;
  width: 100%;
  }

  </style>
      
      
    
      
      

      
      </body>



  </html>