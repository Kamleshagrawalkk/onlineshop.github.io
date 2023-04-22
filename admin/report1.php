<title>Report</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<?php include "config/database.php"?>

<?php
    $odate = $_POST['odate'];
    $rs = mysqli_query($link, "select sum(order_amount) from orders where order_date='$odate'");
    $row = mysqli_fetch_row($rs);
    $sum = $row[0];
    $rs = mysqli_query($link, "select order_id, order_date, uname, order_amount from orders, user where orders.uid = user.id and order_date='$odate' order by order_id");
?>
<body class="container">
<br>
<center><a href="dashboard.php" class="btn btn-warning">Home</a></center>
<br>
<table id="tableID" class="display" style="width:100%;" border=1>
<thead>
    <tr>
        <th>Order ID</th>
        <th>Order Date</th>
        <th>Customer Name</th>
        <th>Total Amount</th>
        <th></th>
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
        <th><a href="manage_orders.php?oid=<?php echo $row[0]?>">Detail View</a></th>
    </tr>
<?php 
    }
?>
<tr>
    <th colspan=3 align="right"><b>Total:</b></th>
    <th>Rs.<?php echo $sum?>/-</th>
    <th></th>
</tr>
</tbody>
</table>

<script>
	$(document).ready(function() {
		$('#tableID').DataTable({ });
	});
</script>
</body>

