<?php session_start(); ?>
<html>
   <head>
	   <title>Sign Up| Gurudatta Agro Services</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
   </head>

<style>
   body, html {
   height: 100%;
   }

   .bg {
      background-image: url("images/signup-background.jpg");
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
   }
</style>

   <body class="bg">
	   <div class="container">
		   <div class="add">
<?php   
   include "database.php";

   $uid = $_SESSION['uid'];
   $rs = mysqli_query($conn, "select * from customer where id=$uid");
   $row = mysqli_fetch_assoc($rs);
?>
   <section class="vh-100">
      <div class="container h-100" >
         <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
               <div class="text-black">
                  <div class="card-body p-md-5">
                     <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 border" style="background-color: #ff4d4d; border-radius: 16px;">
                           <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Profile</p>
                           <form action="edit_profile.php" method="POST"class="mx-1 mx-md-4">
                           <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="id">ID</label>
                                    <input type="text" id="id" name="id" class="form-control" value="<?php echo $row['id']?>" readOnly/>
                                 </div>
                              </div>
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="uname">Full Name</label>
                                    <input type="text" id="userName" name="uname" class="form-control" placeholder="Enter your full name" value="<?php echo $row['uname']?>" required/>
                                 </div>
                              </div>
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="email">Your Email</label>
                                    <input type="email" id="email"name="email" placeholder="Enter your email" required class="form-control" value="<?php echo $row['email']?>"/>
                                 </div>
                              </div>
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" id="address" class="form-control"name="address" placeholder="Enter your address" required value="<?php echo $row['address']?>"/>
                                 </div>
                              </div>
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="phone">Phone No.</label>
                                    <input type="tel" id="phone" class="form-control" name="contact" placeholder="Enter your 10 digits mobile number" pattern="^[6789]\d{9}$" required value="<?php echo $row['contact']?>"/>
                                 </div>
                              </div>
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="text" id="password" class="form-control" name="password" required  placeholder="Enter your password" value="<?php echo $row['password']?>"/>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                 <button type="submit" class="btn btn-success btn-lg" name="submit">Update</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   </div>
</div>
<div class="ftr">
   <div class="footer">
      <footer>   
      </footer>
   </div>
</div>
</body>
</html>