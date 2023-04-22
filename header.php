<?php
   	session_start();
   	$sidd=session_id();

   	include('admin/config/database.php');

	$rs = mysqli_query($link, "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'flower_db' AND TABLE_NAME = 'orders';");
	$row = mysqli_fetch_row($rs);
	$oid = $row[0];
?>
<script>
	$(document).ready(function()
   	{
    	$("#serr").click(function()
    	{
     		var ser=$("#ser").val();
     		if(ser!="")
     		{
   	  			location.href='search.php?ser='+ser;
     		}
    	})
   	})
</script>
<nav class="navbar navbar-inverse" style="background-color: orange;">
	<div class="container">  
		<div class="top-menu">
			<ul class="d-flex">
				<?php if(isset($_SESSION['uid'])){?><li><a href="view_profile.php" style="color: black; font-weight: bold;">Profile</a></li><?php }?>
				<?php if(isset($_SESSION['uid'])){?><li><a href="#" style="color: black; font-weight: bold;">Book Appoinment</a></li><?php }?>
				<?php if(!isset($_SESSION['uid'])){?><li><a href="signUp.php" style="color: black; font-weight: bold;">Sign up</a></li><?php }?>
				<?php if(!isset($_SESSION['uid'])){?><li><a href="login.php" style="color: black; font-weight: bold;">Login</a></li><?php }?>
				<?php if(!isset($_SESSION['uid'])){?><li><a href="admin/index.php" style="color: black; font-weight: bold;">Admin</a></li><?php }?>
				<?php if(isset($_SESSION['uid'])){?><li><a href="logout.php" style="color: black; font-weight: bold;">Logout</a></li><?php }?>
				<?php if(!isset($_SESSION['uid'])){?><li><a href="delivery/index.php" style="color: black; font-weight: bold;">customer visitor</a></li><?php }?>
			</ul>
		</div>             
	</div>
</nav>
<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light">
		<a href="index.php"><img src="images/logo1.png" title="logo" width=150 height=150/></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item px-3">
					<a class="nav-link" href="index.php" style="font-weight: bold;">Home</a>
				</li>
				<li class="nav-item  px-3 ">
					<a class="nav-link" href="aboutus.php" style="font-weight: bold;">About</a>
				</li>
				<li class="nav-item  px-3 ">
					<a class="nav-link" href="contact.php" style="font-weight: bold;">Contact Us</a>
				</li>
			</ul>

				</form>
			</div>
		</div>
	</nav>
</div>
