<?php   
    include "config/database.php";

    $oid = $_GET['oid'];
    $status = $_GET['status'];

    mysqli_query($link, "update orders set status='$status' where order_id=$oid");

    header('Location: view_delivery_person_orders.php');
?>