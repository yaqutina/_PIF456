<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Casting Tipe</title>
</head>
<body>
<?php 

$str = '123abc';

//Casting nilai variabel $str ke integer

$bil = (int)$str; //$bil = 123

echo gettype($str);
//Output : string

echo gettype($bil);
//Output : integer

?> 
</body>
</html>