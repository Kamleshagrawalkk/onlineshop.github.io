<?php
   session_start();
   include("config/database.php");//connect to mysql
   extract($_POST);
   if(isset($login))
   {
      $email=mysqli_real_escape_string($link,htmlentities(trim($email)));
      $pass=mysqli_real_escape_string($link,htmlentities(trim($pass)));
      
      $sel=mysqli_query($link,"select * from admin where email='$email'");
      if(mysqli_num_rows($sel))
      {
         $row = mysqli_fetch_assoc($sel);
         $_SESSION['sid']=$email;
         $_SESSION['aname']=$row['name'];
         echo "<script>alert('Admin login successful');</script>";
         echo "<script>window.location.href='dashboard.php'</script>";
      }
      else
      {
         $msg="Email or password is not correct";
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
      <link rel="stylesheet" href="../css/bootstrap.css"/>
      <link rel="stylesheet" href="css/style.css"/>
      <script src="js/bootstrap.js"></script>
      <title>Admin Login</title>
   </head>
   <body class="bg">
      <main>
         <header class="my-5">
            <h3 class="text-center" style="text-shadow: 3px 3px 3px red; font-weight: bold; font-size: 35px;">ADMIN LOGIN</h3>
         </header>
         <section class="container">
            <div class="row justify-content-center" style="background-color: #ff6600;">
               <div class="order-2 order-lg-1 border">
                  <form method="post" style="padding:50px;">
                  <?php
                     if(isset($msg))
                     {
                  ?>
                  <label class="alert alert-danger"><?= $msg;?></label>
                  <?php
                     }
                  ?>
                  <div class="d-flex flex-row align-items-center mb-2">
                     <div class="form-group flex-fill mb-0">
                        <label class="form-label" for="email"><b>Email:</b></label>
                        <input type="text" name="email" class="form-control" required/>
                     </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-2">
                     <div class="form-group flex-fill mb-0">
                        <label class="form-label" for="pass"><b>Password:</b></label>
                        <input type="password" name="pass" class="form-control" required/>
                     </div>
                  </div>
                  <input type="submit" value="Login" name="login" class="btn btn-success btn-lg" />
                  <input type="reset" value="Reset" class="btn btn-danger btn-lg"/>
                  </form>
               </div>
            </div>
         </section>
      </main>
   </body>
</html>






