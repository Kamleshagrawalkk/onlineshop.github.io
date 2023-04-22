<?php
   session_start();

   include "admin/config/database.php";

   extract($_POST);

   if(isset($login)) {
      $email = mysqli_real_escape_string($link, htmlentities(trim($email)));
      $pass = mysqli_real_escape_string($link, htmlentities(trim($password)));

      $sel = mysqli_query($link, "select *  from customer where email='$email' and password='$pass'");

      if(mysqli_num_rows($sel)>0){
         $row = mysqli_fetch_assoc($sel);
         $_SESSION['uid'] = $row['id'];
         $_SESSION['uemail'] = $row['email'];
         $_SESSION['uname'] = $row['uname'];
         echo "<script>alert('Login successful!!!')</script>";
         echo "<script>window.location.href='index.php'</script>";
      } 
      else {
         $msg = "Email or password is not correct";
      }
   }
?>
<style>
   body, html {
   height: 100%;
   }

   .bg {
      background-image: url("images/background.jpg");
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
   }
</style>

<!doctype html>
<html>
   <head>
      <link rel="stylesheet" href="css/bootstrap.css"/>
      <link rel="stylesheet" href="admin/css/style.css"/>
      <script src="js/bootstrap.js"></script>
      <title>User Login</title>
   </head>
   
   <body class="bg">
      <main>
         <header class="my-5">
            <h3 class="text-center" style="color: white;text-shadow: 3px 3px orangered;">User Login</h3>
         </header>
         <section class="container">
            <div class="row justify-content-center">
               <div class="order-2 order-lg-1 border">
                  <form method="post" >
<?php 
   if(isset($msg)){ 
?>
                     <label class="alert alert-danger"><?php echo $msg?></label>
<?php 
   } 
?>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Email:</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"  required placeholder="Enter Your Email">
                     </div>
                     
                     <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" required placeholder="Your Password">
                     </div>
  
                     <div class="form-group">
                        <label class="form-check-label p-3" for="exampleCheck1">Not registered yet?&nbsp;&nbsp;<a href="signup.php">SignUp</a></label>
                     </div>
                     
                     <button type="submit" name="login" class="btn btn-primary">Submit</button>
                     <input type="reset" value="Reset" class="btn btn-danger"/>
                  </form>
               </div>
            </div>
         </section>
      </main>
   </body>
</html>