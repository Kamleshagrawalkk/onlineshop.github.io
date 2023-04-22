<link rel='stylesheet' type='text/css' href='css/style.css'>
<title>Delivery Person Login</title>
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

   .btn
   {
        text-decoration: none;
        background-color: black;
        color: white;
        padding: 5px;
   }
</style>

<body class="bg">
<form method='post' action='delivery_login1.php'>
<br><br><br>
<table align='center' bgcolor='#FCA;' width='40%'>
<tr>
	<td colspan=2 align='center' style='padding:20px;'><a href='index.php'><img src='images/logo.jpg'/></a></td>
</tr>
</tr>
<tr>
	<td><b>Email ID:</b></td>
	<td style='padding:20px;' align='center'><input type='email' value="" name='did' placeholder='Enter Email ID' required></td>
</tr>
<tr>
	<td><b>Password:</b></td>
	<td style='padding:20px;' align='center'><input type='password' value="" name='dpass' placeholder='Enter Password' required></td>
</tr>
<tr>
	<td style='padding:20px;' align='center'><input type='submit' value='SUBMIT' class='btn'></td>
	<td align='center'><input type='reset' value='RESET' class='btn'></td>
</tr>
</table>
</form>	    
</body>
