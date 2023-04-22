<!DOCTYPE HTML>
<html>
   <head>
      <title>Kuralkar Agrotech| Contact</title>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="Kuralkar Agrotech, ecommerce platform" />
		<link rel="icon" type="image/x-icon" href="/images/favicon.png">
      <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
      <link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/responsiveslides.css">
      <script src="js/jquery.min.js"></script>
      <script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
      <script src="js/imagezoom.js"></script>
      <script defer src="js/jquery.flexslider.js"></script>
      <script>
         $(window).load(function() {
            $('.flexslider').flexslider({
         	   animation: "slide",
         	   controlNav: "thumbnails"
            });
         });
      </script>
      <script src="js/responsiveslides.min.js"></script>
      <script>
         $(function () {
            $("#slider1").responsiveSlides({
               maxwidth: 1600,
               speed: 600
            });
         });
      </script>
   </head>
   <body style="background-color: #ffff80;">
      <?php include("header.php");?>
      <div class="container">
         <div class="row">
            <div class="col-6">
               <div class="map">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14866.80597775265!2d77.59130683024713!3d21.32280829874446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd68b9f94a9e661%3A0xa8f65e0db18cf7d2!2sKarajgaon%2C%20Maharashtra%20444809!5e0!3m2!1sen!2sin!4v1660242124751!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
            </div>
            <div class="col-6">
            <section class="mb-4">
               <h2 class="h1-responsive font-weight-bold text-center my-4">Contact Us</h2>
               <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p>
               <div class="row">
                  <div class="">
                  <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="md-form mb-4">
                              <label for="name" class=""><b>Your Name</b></label>
                              <input type="text" id="name" name="name" class="form-control" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="md-form mb-4">
                              <label for="email" class=""><b>Your Email</b></label>
                              <input type="text" id="email" name="email" class="form-control">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="md-form mb-4">
                              <label for="subject" class=""><b>Subject</b></label>
                              <input type="text" id="subject" name="subject" class="form-control">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="md-form">
                              <label for="message"><b>Your Message</b></label>
                              <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="text-center text-md-left my-4">
                        <input type="submit" class="btn btn-primary" value="Send" name="submit">
                     </div>
                  </form>
               </div>
            </div>
         </section>
      </div>
   </div>
</div>
<div class="clear"> </div>
<?php include("footer.php");?>
</body>
</html>