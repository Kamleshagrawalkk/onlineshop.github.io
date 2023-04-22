<div class="content-sidebar">
<h4>Products</h4>
<ul>
<?php
	$sel=mysqli_query($link,"select distinct occasion from products");
	while($arr=mysqli_fetch_assoc($sel))
	{
?>
		<li>
			<a href="category.php?cat=<?php echo $arr['occasion'];?>">
				<?php echo ucwords($arr['occasion']);?>
			</a>
		</li>
<?php
	}
?>
</ul>
</div>