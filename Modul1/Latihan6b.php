<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Loop foreach</title>
</head>
<body>
<?php 

/**
 * Mencetak string
 * $teks nilai string
 * $bold adalah argumen opsional
 */

function print_teks($teks, $bold = true){
	echo $bold ?'<b>' .$teks. '</b>' : $teks;
}

print_teks('Indonesiaku');
//Mencetak dengan huruf tebal

print_teks('Indonesiaku', false);
//Mencetak dengan huruf reguler

?> 
</body>
</html>