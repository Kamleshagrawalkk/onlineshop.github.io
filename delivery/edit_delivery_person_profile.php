<?php
	include "config/database.php";

	$id = $_POST["did"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$addr = $_POST["addr"];
	$phone = $_POST["phone"];

	$rs = mysqli_query($link, "select * from delivery_person where email='$email' and id<>$id");

	if(mysqli_num_rows($rs)>0){
		echo "<script>alert('Delivery person with this email already registred. Please enter another email.');</script>";
		echo "<script>window.location.href = 'delivery_home.php';</script>";	
	}
	else{
		mysqli_query($link, "update delivery_person set password='$pass', name='$name', address='$addr', contact='$phone', email='$email' where id=$id");
		echo "<script>alert('Profile updated successful');</script>";
		echo "<script>window.location.href = 'delivery_home.php';</script>";	
	}
?>

