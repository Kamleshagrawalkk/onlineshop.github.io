<?php
   session_start();
   include "config/database.php";

   $rs = mysqli_query($link, "select count(*) from customer");
   $row = mysqli_fetch_row($rs);
   $noc = $row[0];

   $rs = mysqli_query($link, "select count(*) from delivery_person");
   $row = mysqli_fetch_row($rs);
   $nodp = $row[0];

   $rs = mysqli_query($link, "select count(*) from products");
   $row = mysqli_fetch_row($rs);
   $nop = $row[0];

   $rs = mysqli_query($link, "select count(distinct type) from products");
   $row = mysqli_fetch_row($rs);
   $not = $row[0];

   $rs = mysqli_query($link, "select count(distinct occasion) from products");
   $row = mysqli_fetch_row($rs);
   $noo = $row[0];

   $rs = mysqli_query($link, "select count(distinct color) from products");
   $row = mysqli_fetch_row($rs);
   $colors = $row[0];

   $rs = mysqli_query($link, "select count(*) from orders");
   $row = mysqli_fetch_row($rs);
   $noo = $row[0];

   $rs = mysqli_query($link, "select count(*) from feedback");
   $row = mysqli_fetch_row($rs);
   $nof = $row[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }

  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">

   <?php include "side-bar.php"?>

   <br>
    
    <div class="col-sm-8">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Welcome <b><u><?=$_SESSION["aname"]?></u></b></p>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <h4>Total Customers</h4>
            <p><?=$noc?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Total Delivery Person</h4>
            <p><?=$nodp?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Total Flower Types</h4>
            <p><?=$not?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Total Occasions</h4>
            <p><?=$noo?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Total Colors</h4>
            <p><?=$colors?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Total Products</h4>
            <p><?=$nop?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Total Orders</h4>
            <p><?=$noo?></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Total Feedbacks</h4>
            <p><?=$nof?></p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
