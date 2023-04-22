<?php 
    session_start();

    include_once 'admin/config/database.php';

    if (isset($_POST['submit'])) {
        $name=mysqli_real_escape_string($link,$_POST['name']);
        $email=mysqli_real_escape_string($link,$_POST['email']);
        $subject=mysqli_real_escape_string($link,$_POST['subject']);
        $message=mysqli_real_escape_string($link,$_POST['message']);

        $sql="INSERT into feedback(name,email,subject,message) VALUES('$name','$email','$subject','$message');";
        mysqli_query($link,$sql);
        
        echo "<script>alert('Your valuable feedback is submitted successfully. Thank You.')</script>";
        echo "echo <script>window.location.href = 'index.php'</script>";
    }
?>