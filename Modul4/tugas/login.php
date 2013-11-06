<?php

session_start();

$username = 'yaqut';
$password = 'tina';

if (isset($_POST['username'])) 
{
	if (($_POST['username'] == $username) && ($_POST['password'] == $password)) 
	{
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
	
		$user = $_SESSION['username'];
		$pass = $_SESSION['password'];

		header ("Location: index.php");

		echo " <a href='logout.php'>  Logout  </a></fieldset>";
	}
	else 
	{
		echo " Kesalahan saat login <br /> ";
		echo " <a href='login.php'> << Back </a>";
	}
}
else 
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" href="stylesheet.css" type="text/css"/>
	<title>Login</title>
	</head>

	<body>
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onSubmit="return checkform(this)">
		<table bordercolor="purple" align="center" width="400" cellpadding="3" bgcolor="#DDA0DD">
		<tr> <td> <h2 style="color:purple"><center> LOGIN </center></h2></td> </tr>
		<tr> <td> <hr align="center" width="350" color="purple"/> </td></tr>
	
		<tr>
		<td style="font-family:Arial; color:purple" ><center>Username<center></td> </tr>
		<tr><td><center><input type="text" name="username" /></center></td>
		</tr><br />
	
		<tr>
		<td style="font-family:Arial; color:purple"><center>Password <center></td> </tr>
		<tr><td><center><input type="text" name="password" /></center></td>
		</tr><br />
	
		<tr> 
		<td align="center"> 
		<input type="submit" name ="login" value="Login">
		</td>
		</tr>
		</table>
		</form>
	</body>
</html>
<?php
}
?>