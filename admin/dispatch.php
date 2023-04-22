<?php	
	include "config/database.php";

	$oid = $_GET["oid"];
?>

<title>Assign Delivery Person</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
	td,th
	{
		padding:10px;
	}
</style>
<body class="container">
<br>
<center><a href="dashboard.php" class="btn btn-warning">Home</a></center>
<br>
<form method="post" action="dispatch1.php">
<table>
	<tr>
		<td>Order No:</td>
		<td><input type="text" name="oid" value="<?php echo $oid?>" readOnly></td>
	</tr>
	<tr>
		<td>Delivery Person:</td>
		<td>
		<select name="did" id="" required>
		<option value="">Select Delivery Person</option>
<?php
	$rs = mysqli_query($link, "select * from delivery_person");
	while($row = mysqli_fetch_row($rs)){
?>
		<option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
<?php
	}
?>
		</select>			
		</td>
	</tr>
	<tr>
		<td><input type="submit" value="Assign" class="btn btn-warning"></td>
		<td><input type="reset" vlaue="Clear" class="btn btn-warning"></td>
	</tr>
</table>
</form>
</body>