<?php
mysql_connect('127.0.0.1','root','');
mysql_select_db('test');
/** Include PHPExcel */
require_once '/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'NIM')
            ->setCellValue('C1', 'Nama')
            ->setCellValue('D1', 'Alamat');

$sql = mysql_query("select * from mahasiswa");
$no = 1;
while($row = mysql_fetch_array($sql)){
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.($no+1), $no)
                ->setCellValue('B'.($no+1), $row['nim'])
                ->setCellValue('C'.($no+1), $row['nama'])
                ->setCellValue('D'.($no+1), $row['alamat']);
    $no += 1;
}
            
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Tugas');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

// Save Excel 95 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));