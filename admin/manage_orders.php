<title>Manage Orders</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
<body>
<center><a href="dashboard.php" class="btn btn-warning">Home</a></center>
<?php include "config/database.php"?>
<?php
	$oid = $_GET['oid'];

	$rs = mysqli_query($link, "select did from orders where order_id=$oid");
	$row = mysqli_fetch_row($rs);

	if($row[0]==0)
		$rs1 = mysqli_query($link, "select order_id, order_date, uname, address, contact, email, order_amount, paymode, cardno, bname, status, 'Not Assigned' from orders, customer where orders.uid = customer.id and order_id=$oid");
	else
		$rs1 = mysqli_query($link, "select order_id, order_date, uname, customer.address, customer.contact, customer.email, order_amount, paymode, cardno, bname, status, name from orders, customer, delivery_person where orders.uid = customer.id and orders.did = delivery_person.id and order_id=$oid");

	$row = mysqli_fetch_row($rs1);
?>
<div style="padding:100px;">
<table class="table table-bordered">
<tr>
	<td><b>Order ID:</b></td>
	<td><?php echo $row[0]?></td>
</tr>
<tr>
	<td><b>Order Date:</b></td>
	<td><?php echo $row[1]?></td>
</tr>
<tr>
	<td><b>Name:</b></td>
	<td><?php echo $row[2]?></td>
</tr>
<tr>
	<td><b>Address:</b></td>
	<td><?php echo $row[3]?></td>
</tr>
<tr>
	<td><b>Phone:</b></td>
	<td><?php echo $row[4]?></td>
</tr>
<tr>
	<td><b>Email:</b></td>
	<td><?php echo $row[5]?></td>
</tr>
<tr>
	<td><b>Total Amount:</b></td>
	<td>Rs.<?php echo $row[6]?>/-</td>
</tr>
<tr>
	<td><b>Payment Mode:</b></td>
	<td><?php echo $row[7]?></td>
</tr>
<tr>
	<td><b>Card No:</b></td>
	<td><?php echo $row[8]?></td>
</tr>
<tr>
	<td><b>Bank:</b></td>
	<td><?php echo $row[9]?></td>
</tr>
<tr>
	<td><b>Status:</b></td>
	<td><?php echo $row[10]?> <a href="dispatch.php?oid=<?php echo $row[0]?>" class="btn btn-danger">Dispatch</a></td>
</tr>	
<tr>
	<td><b>Delivery Person:</b></td>
	<td><?php echo $row[11]?></td>
</tr>	
</table>
<table class="table table-bordered">
<tr class="danger">
	<th>Sr.No.</th>
	<th>Product Name:</th>
	<th>Rate</th>
	<th>Discount</th>
	<th>Qty</th>
	<th>Amount</th>
</tr>
<?php
	$i=1;
	
	$rs2 = mysqli_query($link, "select product_name, price, disc, cart.quan, price*cart.quan-price*cart.quan*disc/100 from products,cart where products.product_id = cart.product_id and order_id=".$row[0]);

	while($row1 = mysqli_fetch_row($rs2))
	{
?>
<tr>
	<td><?php echo $i++?></td>
	<td><?php echo $row1[0]?></td>
	<td><?php echo $row1[1]?></td>
	<td><?php echo $row1[2]?></td>
	<td><?php echo $row1[3]?></td>
	<td><?php echo $row1[4]?></td>
</tr>
<?php
		}
?>
<tr>
	<td colspan=5 align='right'><b>Total:</b></td>
	<td><b>Rs. <?php echo $row[6]?>/-</td>
</tr>
</table>
</div>

