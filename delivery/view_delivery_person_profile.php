<?php
	session_start();
?>
<title>View Profile</title>
<?php
	include "config/database.php";
	$did = $_SESSION["did"];
	$rs = mysqli_query($link, "select * from delivery_person where id='$did'");
	$row = mysqli_fetch_assoc($rs);
?>

<style>
    .btn
   {
    text-decoration: none;
    background-color: black;
    color: white;
    padding: 5px;
    border-radius: 5px;
   }
   td,th
   {
    padding: 5px;
   }
</style>
<body style="background-color: lavender;">

<form method="post" action="edit_delivery_person_profile.php">
<table align='center' width='50%' style='background:#FF80CA;border-radius:8px;box-shadow:8px 8px 8px #888888;font-size:10pt;'>
<tr>
	<td colspan=2 align='center'><a href="delivery_home.php" class="btn">Home</a></td>
</tr>
<tr>
	<td colspan=2 align='center'><b>Delivery Person Details<b></td>
</tr>
<tr>
	<td><b>ID:</b></td>
	<td><input type='text' name='did' value='<?php echo $row["id"]?>' readOnly></td>
</tr>
<tr>
	<td><b>Email ID:</b></td>
	<td><input type='text' name='email' value='<?php echo $row["email"]?>' required></td>
</tr>
<tr>
	<td><b>Password:</b></td>
	<td><input type='text' name='pass' value='<?php echo $row["password"]?>' required></td>
</tr>
<tr>
	<td><b>Full Name:</b></td>
	<td><input type='text' name='name' value='<?php echo $row["name"]?>' required></td>
</tr>
<tr>
	<td><b>Address:</b></td>
	<td><textarea rows=5 cols=40 name='addr' required><?php echo $row["address"]?></textarea></td>
</tr>
<tr>
	<td><b>Phone:</b></td>
	<td><input type='text' name='phone' value='<?php echo $row["contact"]?>' required pattern="^[6789]\d{9}$"></td>
</tr>
<tr>	
    <td align='center'><input type='submit' value='EDIT' class='btn'></td>
	<td align='center'><input type='reset' value='RESET' class='btn'></td>
</tr>
</table>
</form>

</body>

