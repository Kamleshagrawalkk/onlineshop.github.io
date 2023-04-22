<?php
	include "config/database.php";

	$oid = $_POST["oid"];
    $did = $_POST["did"];

	mysqli_query($link,"update orders set did='$did', status='Dispatched' where order_id=$oid");

	header("Location: dashboard.php");
?>
