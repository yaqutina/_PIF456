<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader</title>

</head>
<body>
<?php

/** PHPExcel_IOFactory */
require_once '/Classes/PHPExcel.php';


$inputFileName = 'Book1.xlsx';
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

foreach($sheetData as $baris){
    echo "insert into matakuliahsajian values (null,";
    foreach($baris as $kolom){
        echo '\','.$kolom.'\',';
    }
    echo ");";
}
?>
<body>
</html>