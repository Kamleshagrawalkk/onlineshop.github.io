<?php
	session_start();

	if(!isset($_SESSION['did'])){
		header('Location: index.php');
		exit();
	}
?>

<style>
   body, html {
        height: 100%;
   }

   .bg {
      background-image: url("images/dashboard.jpg");
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
   }   

   .btn
   {
    text-decoration: none;
    background-color: black;
    color: white;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 3px 3px 3px white;
   }
</style>

<title>Delivery Person Home</title>
<body class="bg">
<article style='padding:15px;'>
	<table align='center' width='100%' height='50%'>
	<tr>
		<td style='padding:15px;text-align:center;font-size:20pt;' colspan=4 align='center'>Welcome DELIVERY PERSON - <?php echo $_SESSION["dname"]?></td>
	</tr>
	<tr>
		<td style='padding:15px;text-align:center;padding:5px;'><a href='view_delivery_person_profile.php' class='btn'>View Profile</a></td>
		<td style='padding:15px;text-align:center;padding:5px;'><a href='view_delivery_person_orders.php' class='btn'>View Daily Orders</a></td>
		<td style='padding:15px;text-align:center;padding:5px;'><a href='logout.php' class='btn'>Logout</a></td>
	</tr>
	</table>
</article>    
</body>

