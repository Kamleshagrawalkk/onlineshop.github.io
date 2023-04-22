<?php 
  session_start();
  include "config/database.php";

    $rs = mysqli_query($link, "select order_id, order_date, uname, order_amount, status from orders, customer where orders.uid = customer.id order by order_id");
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
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
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Welcome <b><u><?=$_SESSION["aname"]?></u></b></p>
      </div>
      <div class="row" style="padding: 5px;">

        <h3>Orders Received</h3>

        <table id="tableID" class="display" style="width:100%;" border=1>
<thead>
    <tr style="background-color: black; color: white;">
        <th>Order ID</th>
        <th>Order Date</th>
        <th>Customer Name</th>
        <th>Total Amount</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php 
    $i=1;
    while($row = mysqli_fetch_row($rs))
    {
?>
    <tr>
        <th><?php echo $row[0]?></th>
        <th><?php echo $row[1]?></th>
        <th><?php echo $row[2]?></th>
        <th><?php echo $row[3]?></th>
        <th><?php echo $row[4]?></th>
        <th><a href="manage_orders.php?oid=<?php echo $row[0]?>">Detail View</a></th>
    </tr>
<?php 
    }
?>
</tbody>
</table>
    
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {
		$('#tableID').DataTable({ });
	});
</script>

</body>
</html>
