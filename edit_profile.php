<?php
    session_start();

    include_once 'database.php';

    $uid = $_POST['id'];
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $contact = $_POST['contact'];
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
    $rs = mysqli_query($conn, "select * from customer where email='$email' and id<>$uid");
    if(mysqli_num_rows($rs)>0){
        echo "<script>alert('Email already registered. Please give another email.');</script>";
        echo "<script>window.location.href = 'index.php'</script>";    
    }
    else{
        $sql = "update customer set uname='$uname', email='$email', contact=$contact, address='$address', password='$password' where id=$uid";
        mysqli_query($conn, $sql);
        echo "<script>alert('Profile updated successfully.');</script>";
        echo "<script>window.location.href = 'index.php'</script>";    
    }
?>
