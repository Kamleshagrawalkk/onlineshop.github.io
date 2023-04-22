<?php
    $id = $_GET['id'];

    include "config/database.php";

    mysqli_query($link, "delete from customer where id=$id");

    header("Location: customers.php");
?>