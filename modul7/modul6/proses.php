<!DOCTYPE HTML>
<html>
<head>
	<title>Import</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="../dist/css/bootstrap.min.css"rel="stylesheet" type="text/css">
    <link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
 <nav class="navbar navbar-inverse" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-inverse">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
	<a class="navbar-brand" href="../../index.php"><button type="button" class="btn btn-info" ><span class="glyphicon glyphicon-home"></span>Home</button></a>
	
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="btn btn-success">Modul 4 </button><b class="caret"></b></a>
        <ul class="dropdown-menu"> 
          <li><a href="modul4/studikasus1/index.php">Studi Kasus</a></li>
          <li><a href="modul4/tugaspraktikum/index.php">Tugas Praktikum</a></li>
        </ul>
      </li>
	  
	  <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="btn btn-success">Modul 5 </button><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="modul5/studi kasus/studikasus.php">Studi Kasus</a></li>
          <li><a href="modul5/praktikum/prak.php">Tugas Praktikum</a></li>
        </ul>
      </li>
	  
	  	  <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><button type="button" class="btn btn-success">Modul 6 </button><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="modul6/index.php">Export & Import</a></li>
        </ul>
      </li>
    </ul>
	
	<ul class="nav navbar-nav navbar-right">
       
	  	 <div class="btn-group">
    <a class="btn btn-danger" href="#"><span class="glyphicon glyphicon-user"></span>Umi Kholifah</a>
    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
    <ul class="dropdown-menu">
    <li><a href="#"><span class="glyphicon glyphicon-heart"></span> My Profile</a></li>
    <li class="divider"></li>
    <li><a href="#"><span class="glyphicon glyphicon-file"></span>My Assigment</a></li>
    </ul>
    </div>
    </ul>
	
  </div><!-- /.navbar-collapse -->
</nav>
<?php
 //menggunakan class phpExcelReader
 include "excel_reader2.php";
 include "koneksi.php";
  
//membaca file excel yang diupload
 $data = new Spreadsheet_Excel_Reader($_FILES['input']['tmp_name']);
 //membaca jumlah baris dari data excel
 $baris = $data->rowcount($sheet_index=0);
 
//nilai awal counter jumlah data yang sukses dan yang gagal diimport
 $sukses = 0;
 $gagal = 0;
 
//import data excel dari baris kedua, karena baris pertama adalah nama kolom
 for ($i=2; $i<=$baris; $i++) {
 //membaca data nip (kolom ke-1)
 $nim = $data->val($i,1);
 //membaca data nama depan (kolom ke-2)
 $nama = $data->val($i,2);
 //membaca data nama belakang (kolom ke-3)
 $alamat=$data->val($i,3);
 
//setelah data dibaca, sisipkan ke dalam tabel 
 $query = "INSERT INTO mahasiswa values ('$nim','$nama','$alamat')";
 $hasil = mysql_query($query);
 
//menambah counter jika berhasil atau gagal
 if($hasil){ $sukses++;}
 else{ $gagal++;
 echo 'Pemasukan data gagal nim ' .$nim. ' sudah digunakan !' .'<br>'; 
 }

 
}
 //tampilkan report hasil import
 echo "<h3> Proses Import Data Mahasiswa</h3>";
 echo "<p>Jumlah data berhasil diimport : ".$sukses."<br>";
 echo "Jumlah data gagal diimport : ".$gagal."<p>";
 
?>
</div>
	<table class="table table-hover">
        <tr class="success">
        	<td>NIM</th>
            <td>Nama</th>
            <td>Alamat</th>
        </tr>
        	<?php
				$sql= mysql_query("select * from mahasiswa ");
				while ($isi= mysql_fetch_array($sql)){
			?>
        <tr class="info">
			<td><?php echo $isi['nim']; ?> </td>
            <td><?php echo $isi['nama']; ?> </td>
            <td><?php echo $isi['alamat']; ?> </td>
         </tr>
		<?php
			}
		?>
	</table>
</div>
<a href="download.php"><button type="button" class="btn btn-success">Download </button></a>
<a href="download2.php"><button type="button" class="btn btn-success">Download dengan Header</button></b></a>


   
	<script src="../dist/js/bootstrap.min.js"></script>
	<script src="../dist/js/jquery.js"></script>
</body>
</html>
