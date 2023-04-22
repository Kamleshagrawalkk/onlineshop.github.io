<?php
	session_start();

	include "config/database.php";

	$did = $_POST["did"];
	$dpass = $_POST["dpass"];

	$rs = mysqli_query($link, "select * from delivery_person where  email = '$did' and password = '$dpass'");

	if(mysqli_num_rows($rs)>0)
	{
		$row = mysqli_fetch_row($rs);
		$_SESSION["did"]=$row[0];
		$_SESSION["dname"]=$row[1];
		echo "<script>alert('Delivery person login successful');</script>";
		echo "<script>window.location.href = 'delivery_home.php';</script>";
	}
	else
	{
		echo "<script>alert('Login failed. Invalid login id/password.');</script>";
		echo "<script>window.location.href = 'index.php';</script>";
	}
?>

