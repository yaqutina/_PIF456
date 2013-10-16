<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body>
<?php
$a = 3;
$b = 4;
$c = 0;

	echo"Operasi Aritmatika"
	echo 'Penjumlahan ='$a + $b 
	echo 'Pengurangan ='$a - $b
	echo 'Pembagian   ='$a / $b
	echo 'Perkalian   ='$a * $b
	
	echo"Operasi Logika"
	if ($a > $b) {
	echo 'a lebih dari b';
	}else {
	echo 'a tidak lebih besar dari b';
	}
	
	echo"Operasi Percabangan"
	switch ($c){
	case 0;
	echo "c equals o";
	break;
	case 1;
	echo "c equals 1";
	break;
	case 2;
	echo "c equals 2";
	break;
	}
	
	echo"Operasi Perulangan"
	while ($c < 5) {
	echo $c;
	$c++;
	}
	
?>
</body>
</html>