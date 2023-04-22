<!DOCTYPE HTML>
<html>
   <head>
      <title>My Flower Shop| Home</title>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="My Flower Shop, ecommerce platform" />
		<link rel="icon" type="image/x-icon" href="/images/favicon.png">
      <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
      <link rel="stylesheet" href="css/responsiveslides.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/jquery.min.js"></script>
      <script src="js/responsiveslides.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
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
      <?php include("slider.php");?>
      <div class="clear"></div>
      <div class="container">
         <div class="row mt-5">
            <div class="col-9">
               <?php include("content.php");?>
            </div>
            <div class="col-3">
               <?php include("sidebar.php");?>
            </div>
         </div>         
      </div>
      <div class="clear"> </div>
      <?php include("footer.php");?>
   </body>
</html>