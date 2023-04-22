
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
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
   <?php include("header.php");
   $ser=$_GET['ser'];
   ?>
 
	 <div class="clear"> </div>					    	
<div class="content-grids">
  <h4>Search Product</h4>
		    	<div class="section group">
			<?php
	$sel=mysqli_query($link,"select * from products where occasion like '$ser%' or product_name like '$ser%' or type like '%$ser%' or color like '%$ser%'");
	while($arr=mysqli_fetch_assoc($sel))
	{
		?>
       <div class="grid_1_of_4 images_1_of_4 products-info">
					 <a href="productdetails.php?pid=<?= $arr['product_id'];?>">
					 <img src="admin/products/<?= $arr['product_id'];?>.jpg">
					 </a>
					 <a href="category.php?cat=<?= $arr['occassion'];?>"><?= $arr['occasion'];?></a>
					 <h3 style="text-decoration:line-through">Rs.<?= $arr['price'];?></h3>
					  <h3>Rs.<?= $arr['price']-(($arr['price']*$arr['disc'])/100);?></h3>
					 <ul>
					 	<li><a  class="i" href="productdetails.php?pid=<?= $arr['product_id'];?>"> </a></li>
					 </ul>
				</div>
		<?php
	}
		?>		
				</div>
</div>
</div>
	<?php include("sidebar.php");?>
</div>
	 <div class="clear"> </div>
 </div>
		<?php include("footer.php");?>
	</body>
</html>

