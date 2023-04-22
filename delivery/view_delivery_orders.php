<title>View Orders</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<body style='background:url(images/bg.jpg);background-repeat: no-repeat;background-size:100%;'>
<article style='padding:30px;'>
<center><a href='delivery_home.php' class='btn btn-warning'>Home</a></center>
<?php
	include "config/database.php";

	$oid = $_GET['oid'];
    
	$rs = mysqli_query($link, "select order_id, order_date, uname, customer.address, customer.contact, customer.email, order_amount, status, paymode, cardno, bname, name from orders, customer, delivery_person where orders.uid = customer.id and orders.did = delivery_person.id and orders.order_id=$oid");

	while($row = mysqli_fetch_row($rs))
	{
?>

<table class="table" width='40%' height='40%' align='center'>
<tr>
	<td><b>Order ID:</b></td>
	<td><?php echo $row[0]?></td>
</tr>
<tr>
	<td><b>Order Date:</b></td>
	<td><?php echo $row[1]?></td>
</tr>
<tr>
	<td><b>Customer Name:</b></td>
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
	<td><b>Email ID:</b></td>
	<td><?php echo $row[5]?></td>
</tr>
<tr>
	<td><b>Total:</b></td>
	<td>Rs.<?php echo $row[6]?>/-</td>
</tr>
<tr>
	<td><b>Status:</b></td>
	<td>
        <?php echo $row[7]?>&nbsp;&nbsp;<a href='change_status.php?oid=<?php echo $row[0]?>&status=Delivered' class="btn btn-info">Delivered</a>
        &nbsp;&nbsp;<a href='change_status.php?oid=<?php echo $row[0]?>&status=Returned' class="btn btn-info">Returned</a></td>
</tr>
<tr>
	<td><b>Payment Mode:</b></td>
	<td><?php echo $row[8]?></td>
</tr>
<tr>
	<td><b>Card No:</b></td>
	<td><?php echo $row[9]?></td>
</tr>
<tr>
	<td><b>Bank Name:</b></td>
	<td><?php echo $row[10]?></td>
</tr>
<tr>
	<td><b>Delivery Person:</b></td>
	<td><?php echo $row[11]?></td>
</tr>
</table><br>
<?php
	$rs1 = mysqli_query($link, "select product_name, price, disc, cart.quan, price*cart.quan-price*cart.quan*disc/100 from products,cart where products.product_id = cart.product_id and order_id=".$row[0]);
?>
<table width='80%' align='center' class="table">
<tr>
	<th>Sr.No.</th>
	<th>Product Name:</th>
	<th>Rate</th>
	<th>Discount</th>
	<th>Qty</th>
	<th>Amount</th>
</tr>
</tr>
<?php
    $i=1;
    while($row1 = mysqli_fetch_row($rs1))
	{
?>
<tr>
    <td><?php echo $i?></td>
	<td><?php echo $row1[0]?></td>
	<td><?php echo $row1[1]?></td>
	<td><?php echo $row1[2]?></td>
	<td><?php echo $row1[3]?></td>
	<td><?php echo $row1[4]?></td>
</tr>
<?php
        $i++;
	}
?>
</table><br>
<?php
}
?>
</article>
</body>
