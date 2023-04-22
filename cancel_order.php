<?php session_start()?>
<title>Cancel Order</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
td{
	padding:10px;
}
select{
	padding:10px;
}
</style>
<?php include "admin/config/database.php"?>	
<div style="padding:150px;">

<?php
	$uid = $_SESSION["uid"];

	$sql = "select order_id from orders where uid=$uid and status='Pending'";
	$rs = mysqli_query($link, $sql);
?>
<form method='post' action='cancel_order1.php'>
<table>
<tr>
	<td><b>Order ID:</b></td>
	<td>
	<select name='oid' required>
	<option value=''>Select Order ID</option>
	<?php
		while($row = mysqli_fetch_row($rs))
		{
	?>
	<option value=<?php echo $row[0]?>><?php echo $row[0]?></option>
	<?php
		}
	?>	
	</select>	
	</td>
	<td><input type='submit' value='Cancel' class='btn btn-warning'></td>
</tr>
</table>
</form>
</div>
