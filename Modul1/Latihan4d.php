<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Seleksi switch</title>
</head>
<body>
<?php 

$i = 0;

if($i == 0){
echo "i equals 0";
}elseif( $i == 1){
echo "i equals 1";
}elseif( $i == 2){
echo "i equals 2";
}

//Ekuivalen dengan pendekatan switch
Switch ($i){
case 0:
echo "i equals 0";
break;
case 1:
echo "i equals 1";
break;
case 2:
echo "i equals 2";
break;
}
?> 
</body>
</html>