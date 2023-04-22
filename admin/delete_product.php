<?php
	include "config/database.php";

	$id = $_GET['id'];

	mysqli_query($link, "delete from products where product_id=$id");

    unlink("products/$id.jpg");

	header("Location: products.php");
?>
