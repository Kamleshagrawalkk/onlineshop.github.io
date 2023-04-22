<?php session_start(); ?>
<html>
   <head>
	   <title>Sign Up| My Flower Shop</title>
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
   if(isset($_SESSION['u_id'])) {
      header("Location: index.php");
   } 
?>
   <section class="vh-100">
      <div class="container h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
               <div class="text-black">
                  <div class="card-body p-md-5">
                     <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 border" style="background: #ff4d4d; border-radius: 16px;">
                           <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                           <form action="signup_inc.php" method="POST"class="mx-1 mx-md-4">
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="uname">Full Name</label>
                                    <input type="text" id="userName" name="uname" class="form-control" placeholder="Enter your full name" required/>
                                 </div>
                              </div>
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="email">Your Email</label>
                                    <input type="email" id="email"name="email" placeholder="Enter your email" required class="form-control" />
                                 </div>
                              </div>
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="address">Address</label>
                                    <input type="text" id="address" class="form-control"name="address" placeholder="Enter your address" required />
                                 </div>
                              </div>
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="phone">Phone No.</label>
                                    <input type="tel" id="phone" class="form-control" name="contact" placeholder="Enter your 10 digits mobile number" pattern="^[6789]\d{9}$" required />
                                 </div>
                              </div>
                              <div class="d-flex flex-row align-items-center mb-2">
                                 <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" required  placeholder="Enter your password"/>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                 <button type="submit" class="btn btn-info btn-lg" name="submit">Sign Up</button>
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