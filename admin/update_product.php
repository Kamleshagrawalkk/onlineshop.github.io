<?php 
  session_start();
  include "config/database.php";

  if(isset($_POST['submit']))
  {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $disc = $_POST['disc'];
    $occasion = $_POST['occasion'];
    $type = $_POST['type'];
    $color = $_POST['color'];
    $sql = "update products set product_name='$name',price=$price,disc=$disc,occasion='$occasion',type='$type',color='$color' where product_id=$id";
    mysqli_query($link, $sql);
    $target_file = $id . ".jpg";
	move_uploaded_file($_FILES["imgurl"]["tmp_name"], "products/".$target_file);		
    header("Location: products.php");
  }
  $id = $_GET['id'];
  $rs = mysqli_query($link, "select * from products where product_id=$id");
  $row = mysqli_fetch_row($rs);
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

	td,th{
		padding: 10px;
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

<form method='post' action='update_product.php' name='add' enctype="multipart/form-data">
<table align='center' width="50%">
<tr>
	<td><b>ID:</b></td>
	<td><input type='text' name='id' value="<?=$row[0]?>" readOnly></td>
</tr>
<tr>
	<td><b>Name:</b></td>
	<td><input type='text' name='name' value="<?=$row[1]?>" required></td>
</tr>
<tr>
	<td><b>Price:</b></td>
	<td><input type='number' name='price' value="<?=$row[2]?>" min=250 max=3500 required></td>
</tr>
<tr>
	<td><b>Discount(%):</b></td>
	<td><input type='number' name='disc' min=5 max=10 value="<?=$row[3]?>" required></td>
</tr>
<tr>
	<td><b>Occasion:</b></td>
	<td>
    <select name="occasion" required>
        <option value="<?=$row[4]?>"><?=$row[4]?></option>
      <option value="">Select Occasion</option>
      <option value="Fathers Day">Fathers Day</option>
      <option value="Mothers Day">Mothers Day</option>
      <option value="Thank You">Thank You</option>
      <option value="Friendship Day">Friendship Day</option>
      <option value="Get Well Soon">Get Well Soon</option>
      <option value="Anniversary">Anniversary</option>
      <option value="Congratulations">Congratulations</option>
      <option value="I Am Sorry">I Am Sorry</option>
      <option value="New Born">New Born</option>
      <option value="Appreciation">Appreciation</option>
    </select>
  </td>
</tr>
<tr>
	<td><b>Type:</b></td>
	<td>
    <select name="type" required>
        <option value="<?=$row[5]?>"><?=$row[5]?></option>
      <option value="">Select Type</option>
      <option value="Roses">Roses</option>
      <option value="Gerberas">Gerberas</option>
      <option value="Carnations">Carnations</option>
      <option value="Orchinds">Orchids</option>
      <option value="Mixed">Mixed</option>
      <option value="Lilies">Lilies</option>
    </select>
  </td>
</tr>
<tr>
	<td><b>Color:</b></td>
	<td>
    <select name="color" required>
        <option value="<?=$row[6]?>"><?=$row[6]?></option>
      <option value="">Select Color</option>
      <option value="Red">Red</option>
      <option value="Yellow">Yellow</option>
      <option value="Orange">Orange</option>
      <option value="Purple">Purple</option>
      <option value="Maroon">Maroon</option>
      <option value="Cyan">Cyan</option>
      <option value="Magenta">Magenta</option>
      <option value="Pink">Pink</option>
      <option value="Lavender">Lavender</option>
    </select>
  </td>
</tr>
<tr>
	<td><b>Photo:</b></td>
	<td><input type='file' name='imgurl'></td>
</tr>
<tr>
	<td align='center'><input type='submit' value='UPDATE' class='btn btn-warning' name="submit"></td>
	<td align='center'><input type='reset' value='CLEAR' class='btn btn-warning'></td>
</tr>
</table>
</form>
    
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
