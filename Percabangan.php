<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body>
<?php

		
	echo"Operasi Percabangan";
	echo"<br>";
	echo"<br>";
echo"contoh :";
echo"<br>";
echo"<br>";

echo"a = 6";echo"<br>";
echo"b = 3";echo"<br>";
echo"if(a >b) {";echo"<br>";
echo"echo 'a lebih besar dari b';";echo"<br>";
echo"} elseif ($a == $b){";echo"<br>";
echo"echo 'a sama dengan b';";echo"<br>";
echo"}else{";echo"<br>";
echo"echo 'a kurang dari b'; }";echo"<br>";
echo"<br>";
echo"hasil";
echo"<br>";



$a = 6;
$b = 3;

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