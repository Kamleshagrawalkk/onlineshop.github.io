<script>
	$(document).ready(function()
   	{
    	$(".delcart").click(function()
    	{
   	 		pid=$(this).attr('piid');
   	 		quan=$(this).attr('quann');
   	 		$.post('admin/api.php',{sumit:pid,rahul:quan},function(res)
   	 		{
            	alert(res);
   	   			$('body').load('index.php');
   	 		})
    	})
   	})
</script>
<h4 class="mb-5">Deals of the day</h4>
<div class="section group">
<div class="row">
<?php
	$sel=mysqli_query($link,"select * from products order by product_id desc limit 12");
    while($arr=mysqli_fetch_assoc($sel))
    {
?>
	<div class="col-lg-3 col-md-6 col-sm-6">
		<figure class="card card-product-grid"  style="padding:12px;">
			<div class="img-wrap"> 
				<img src="admin/products/<?=$arr['product_id']?>.jpg"> 
			</div>
			<figcaption class="info-wrap border-top pt-2">
			<div class="price-wrap">
				<span class="price">Rs.<?php echo $arr['price'];?></span><br>
				<span class="price">Rs.<?php echo $arr['price']-(($arr['price']*$arr['disc'])/100);?></span>						
			</div>
			<div class="desc-wrap">
				<span class="price"><?php echo $arr['product_name'];?></span>						
			</div>
			<div class="products-info">							
				<ul class="icon-wrap">
					<li class="-md"><a  class="btn delcart btn-success" href="javascript:void()" piid="<?php echo $arr['product_id'];?>" quann=1><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart </a></li>
					<li><a  class="btn" href="productdetails.php?pid=<?php echo $arr['product_id'];?>"><i class="fa fa-eye" aria-hidden="true"></i> </a></li>
				</ul>
			</div>	
			</figcaption>
		</figure>
	</div>
<?php
	}
?>		
</div>
</div>