<?php 
  session_start();
  include "config/database.php";

  if(isset($_POST['submit']))
  {
	$email = $_POST["email"];
	$passwd = $_POST["passwd"];
	$name = $_POST["name"];
	$addr = $_POST["addr"];
	$phno = $_POST["phno"];
	$rs = mysqli_query($link, "select * from delivery_person where email='$email'");
	if(mysqli_num_rows($rs)>0){
		echo "<script>alert('Delivery person already exist');</script>";
		echo "<script>windlow.location.href='delivery.php'</script>";
	}
	else{
		mysqli_query($link, "insert into delivery_person(name, email, contact, address, password) values('$name', '$email', '$phno', '$addr', '$passwd')");
	}		
  }
  $sql = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'flower_db' AND TABLE_NAME = 'delivery_person'";
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

<form method='post' action='delivery.php' name='add' enctype="multipart/form-data">
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
	<td><b>Email ID:</b></td>
	<td><input type='email' name='email' required></td>
</tr>
<tr>
	<td><b>Phone:</b></td>
	<td><input type='tel' name='phno' required pattern="^[6789]\d{9}$"></td>
</tr>
<tr>
	<td><b>Address:</b></td>
	<td><input type='text' name='addr' required></td>
</tr>
<tr>
	<td><b>Password:</b></td>
	<td><input type='text' name='passwd' required></td>
</tr>
<tr>
	<td align='center'><input type='submit' value='ADD' class='btn btn-warning' name="submit"></td>
	<td align='center'><input type='reset' value='CLEAR' class='btn btn-warning'></td>
</tr>
</table>
</form>
<br>

        <?php
        $rs = mysqli_query($link, "select * from delivery_person");
        ?>

        <h3>Registered Delivery Person</h3>

        <table id="tableID" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
				<th>Password</th>
                <th></th>
				<th></th>
            </tr>
        </thead>
        <tbody>
    <?php
                while($row = mysqli_fetch_assoc($rs)){
    ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['contact']?></td>
                <td><?=$row['address']?></td>
				<td><?=$row['password']?></td>
                <td><a href="delete_delivery.php?id=<?=$row['id']?>" class="btn btn-warning">Delete</a></td>
				<td><a href="update_delivery.php?id=<?=$row['id']?>" class="btn btn-warning">Update</a></td>
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
