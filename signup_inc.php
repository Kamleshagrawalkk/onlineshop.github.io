<?php
    if (isset($_POST['submit'])) {
        include_once 'database.php';

        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $contact = $_POST['contact'];
        $address = mysqli_real_escape_string($conn, $_POST['address']);
    
        $sql = "SELECT * FROM customer WHERE uname='$uname'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            echo "<script>alert('Use already registred.');</script>";
            echo "<script>window.location.href = 'index.php'</script>";
            exit();
        } 
        $sql = "INSERT INTO customer(uname, email,contact, address, password) VALUES ('$uname','$email','$contact','$address', '$password')";
        mysqli_query($conn, $sql);
        echo "<script>alert('You are registred successfully.');</script>";
        echo "<script>window.location.href = 'index.php'</script>";
    }
    else {
        echo "<script>alert('Something went wrong.');</script>";
        echo "<script>window.location.href = 'index.php'</script>";
    }
?>
