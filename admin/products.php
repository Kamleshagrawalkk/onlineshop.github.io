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
    $sql = "insert into products(product_name,price,disc,occasion,type,color) values('$name', $price, $disc, '$occasion', '$type', '$color')";
    mysqli_query($link, $sql);
    $target_file = $id . ".jpg";
		move_uploaded_file($_FILES["imgurl"]["tmp_name"], "products/".$target_file);		
  }
  $sql = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'flower_db' AND TABLE_NAME = 'products'";
  $rs = mysqli_query($link, $sql);
  $row = mysqli_fetch_row($rs);
  $id = $row[0];
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

<form method='post' action='products.php' name='add' enctype="multipart/form-data">
<table align='center' width="50%">
<tr>
	<td><b>ID:</b></td>
	<td><input type='text' name='id' value="<?=$id?>" readOnly></td>
</tr>
<tr>
	<td><b>Name:</b></td>
	<td><input type='text' name='name' required></td>
</tr>
<tr>
	<td><b>Price:</b></td>
	<td><input type='number' name='price' min=250 max=3500 required></td>
</tr>
<tr>
	<td><b>Discount(%):</b></td>
	<td><input type='number' name='disc' min=5 max=10 required></td>
</tr>
<tr>
	<td><b>Occasion:</b></td>
	<td>
    <select name="occasion" required>
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
	<td align='center'><input type='submit' value='ADD' class='btn btn-warning' name="submit"></td>
	<td align='center'><input type='reset' value='CLEAR' class='btn btn-warning'></td>
</tr>
</table>
</form>
<br>

        <?php
        $rs = mysqli_query($link, "select * from products order by product_id");
        ?>

        <h3>Products List</h3>

        <table id="tableID" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price(Rs.)</th>
                <th>Discount(%)</th>
                <th>Occasion</th>
				        <th>Type</th>
                <th>Color</th>
                <th></th>
				        <th></th>
            </tr>
        </thead>
        <tbody>
    <?php
                while($row = mysqli_fetch_assoc($rs)){
    ?>
            <tr>
                <td><?=$row['product_id']?></td>
                <td><img src='<?="products/".$row['product_id'].".jpg"?>' alt=""></td>
                <td><?=$row['product_name']?></td>
                <td><?=$row['price']?></td>
                <td><?=$row['disc']?></td>
                <td><?=$row['occasion']?></td>
				        <td><?=$row['type']?></td>
                <td><?=$row['color']?></td>
                <td><a href="delete_product.php?id=<?=$row['product_id']?>" class="btn btn-warning">Delete</a></td>
				        <td><a href="update_product.php?id=<?=$row['product_id']?>" class="btn btn-warning">Update</a></td>
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
