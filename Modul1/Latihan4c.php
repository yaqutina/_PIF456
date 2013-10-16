<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Seleksi if-elseif</title>
</head>
<body>
<?php 

$a = 10;
$b = 5;

if($a >$b) {
	echo 'a lebih besar dari b';
} elseif ($a == $b){
	echo 'a sama dengan b';
}else{
echo 'a kurang dari b';
}
?> 
</body>
</html>