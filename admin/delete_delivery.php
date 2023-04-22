<?php
	include "config/database.php";

	$id = $_GET['id'];

	mysqli_query($link, "delete from delivery_person where id='$id'");

	header("Location: delivery.php");
?>
