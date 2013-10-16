<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cek Tipe</title>
</head>
<body>
<?php 

$bil = 3;
var_dump(is_int($bil));
//Output : bool(true)

$var ="";
var_dump(is_string($var));
//Output : bool(true)

?> 
</body>
</html>