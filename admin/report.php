<?php session_start()?>
<title>Report</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
td{
	padding:10px;
}
</style>
<body class="container">
<br><br>
<form method='post' action='report1.php'>
<table>
<tr>
	<td><b>Date:</b></td>
	<td><input type="date" name="odate"></td>
	<td><input type='submit' value='Show' class='btn btn-warning'></td>
</tr>
</table>
</form>
</body>	
