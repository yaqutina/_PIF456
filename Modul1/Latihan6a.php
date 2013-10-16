<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>contoh prosedur</title>
</head>
<body>
<?php 

//contoh prosedur
function do_print () {
	//Mencetak informasi timestamp
echo time();
}

//Memanggil prosedur
do_print();

echo "<br />";

//Conto fungsi penjumlahan
function jumlah($a, $b) {
	return ($a + $b);
}
echo jumlah (2, 3);
//output : 5

?> 
</body>
</html>