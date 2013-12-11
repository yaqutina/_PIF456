<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2013 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2013 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.9, 2013-06-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Asia/Jakarta');

/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';
require_once 'koneksi.php';

// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
							 
// Add some data
echo date('H:i:s') , " Add some data" , EOL;
$query = mysql_query('select nim, nama, alamat from mahasiswa');

//set table header
$objPHPExcel->getActiveSheet()->setCellValue('G7', 'No');
$objPHPExcel->getActiveSheet()->setCellValue('H7', 'NIS');
$objPHPExcel->getActiveSheet()->setCellValue('I7', 'Nama');
$objPHPExcel->getActiveSheet()->setCellValue('J7', 'Alamat');

//start data from row 11
$i = 8;
$no= 1;
while($data=mysql_fetch_array($query)){
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $no);
	$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $data['nim']);
	$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $data['nama']);
	$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $data['alamat']);
	$i++;
	$no++;
}

// Set title row bold;
$objPHPExcel->getActiveSheet()->getStyle('E7:M7')->getFont()->setBold(true);
// Set fills
$objPHPExcel->getActiveSheet()->getStyle('E7:M7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('E7:M7')->getFill()->getStartColor()->setARGB('FF9430');
$objPHPExcel->getActiveSheet()->getStyle('F7:I7')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('F7:I7')->getFill()->getStartColor()->setARGB('FF9430');

$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->mergeCells('E2:M2');
$objPHPExcel->getActiveSheet()->setCellValue('E2', "KEMENTERIAN PENDIDIKAN NASIONAL");
$objPHPExcel->getActiveSheet()->mergeCells('E3:M3');
$objPHPExcel->getActiveSheet()->setCellValue('E3', "UNIVERSITAS NEGERI MALANG");
$objPHPExcel->getActiveSheet()->mergeCells('E4:M4');
$objPHPExcel->getActiveSheet()->setCellValue('E4', "FAKULTAS TEKNIK");
$objPHPExcel->getActiveSheet()->mergeCells('E5:M5');
$objPHPExcel->getActiveSheet()->setCellValue('E5', "Gedung H5 Jl. Semarang No.5 Malang");
$objPHPExcel->getActiveSheet()->mergeCells('E6:M6');
$objPHPExcel->getActiveSheet()->setCellValue('E6', "REKAPITULASI DATA MAHASISWA S1 PTI 2011 OFF B");
$objPHPExcel->getActiveSheet()->getStyle('E2:M6')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('E2:M5')->getFont()->setSize(18);
$objPHPExcel->getActiveSheet()->getStyle('E6')->getFont()->setSize(22);
$objPHPExcel->getActiveSheet()->getStyle('E2:M6')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A2:M6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;


// Echo memory peak usage
echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " Done writing file" , EOL;
echo 'File has been created in ' , getcwd() , EOL;
