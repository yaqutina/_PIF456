<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Studi Kasus 1</title>
</head>
<body>

<form action="<?php $_SERVER ['PHP_SELF'];?>" method="post">
	Agama
	<select name="religion">
	<option value="Islam">Islam
	<option value="Kristen">Kristen
	<option value="Katolik">Katolik
	<option value="Hindu">Hindu
	<option value="Budha">Budha
	</select><br/>
	
	<input type="submit" value="OK" />
	</form>

<?php
if(isset ($_POST['religion'])){
	echo $_POST['religion'];
}
?> 
</body>
</html>
