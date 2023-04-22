<title>Track Order</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php include "database.php"?>
<?php 
	$oid = $_POST["oid"];

	$rs1 = mysqli_query($conn, "select order_id, order_date, uname, address, contact, email, order_amount, paymode, cardno, bname, status from orders, customer where orders.uid = customer.id and order_id=$oid");
	$row = mysqli_fetch_row($rs1);

	$rs2 = mysqli_query($conn, "select product_name, price, disc, cart.quan, price*cart.quan-price*cart.quan*disc/100 from products,cart where products.product_id = cart.product_id and order_id=$oid");
?>
<div style="padding:100px;">
<center><a href="index.php" class="btn btn-warning">Home</a></center>
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
	<td><b>Pay Mode:</b></td>
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
	<td><?php echo $row[10]?></td>
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
	while($row1 = mysqli_fetch_row($rs2)){
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
	$tot = $row[6];
	$gst = $tot * 0.018;
	$cst = $tot * 0.018;
	$final_tot = $tot + $gst + $cst;
?>
<tr>
<td colspan=5 align='right'><b>Total:</b></td>
<td>Rs. <?php echo $tot?>/-</td>
</tr>
<tr>
<td colspan=5 align='right'><b>GST@1.8%:</b></td>
<td>Rs. <?php echo $gst?>/-</td>
</tr>
<tr>
<td colspan=5 align='right'><b>CST@1.8%:</b></td>
<td>Rs. <?php echo $cst?>/-</td>
</tr>
<tr>
<td colspan=5 align='right'><b>Final Total:</b></td>
<td>Rs. <?php echo $final_tot?>/-</td>
</tr>

</table>
</div>

