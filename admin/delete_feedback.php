<?php
    $id = $_GET['id'];

    include "config/database.php";

    mysqli_query($link, "delete from feedback where id=$id");

    header("Location: feedbacks.php");
?>