<?php
    session_start();
    
    include "admin/config/database.php";

    if(!isset($_SESSION["uid"])){
        echo "<script>alert('You are not logged in.')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }

    $oid = $_POST['oid'];
    $odate = $_POST['odate'];
    $tot = $_POST['tot'];
    $tot1 = $_POST['tot1'];
    $tot2 = $_POST['tot2'];
    $tot3 = $_POST['tot3'];
    $paymode = $_POST['paymode'];
    $uid = $_SESSION['uid'];
    $cardno = $_POST['cardno'];
    $bname = $_POST['bname'];

    mysqli_query($link, "insert into orders values($oid, '$odate', $tot, $uid, '$paymode', '$cardno', '$bname', 'Pending','')");
    echo "<script>alert('Your order is placed successfully. Will be delivered within 7 working days.')</script>";
    echo "<script>window.location.href='index.php'</script>";
?>
