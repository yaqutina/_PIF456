<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Identifikasi Metode</title>
</head>
<body>

<form action="<?php $_SERVER ['PHP_SELF'];?>" method="get">
Nama
<input type="text" name="nama"/><br/>
<input type="submit" value="OK"/>
</form>

<?php 
if(isset ($_REQUEST['nama'])){
echo'Metode,'.$_SERVER['REQUEST_METHOD'];
}
?> 
</body>
</html>
