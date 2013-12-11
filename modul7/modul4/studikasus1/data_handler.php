<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="../../dist/css/bootstrap.css">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
/**
* Fungsi utama untuk menangani pengolahan data
* @param string root parameter menu
*/
function data_handler($root) {
if (isset($_GET['act']) && $_GET['act'] == 'add') {
data_editor($root);
return;
}
$sql = 'SELECT COUNT(*) AS total FROM ' . MHS;
$cnn = mysql_query($sql);
// Jika data di tabel ada
if (mysql_num_rows($cnn)) {
if (isset($_GET['act']) && $_GET['act'] != '') {
switch($_GET['act']) {
case 'edit':
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
data_editor($root, $_GET['id']);
} else {
show_admin_data($root);
}
break;
case 'view':
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
data_detail($root, $_GET['id'], 1);
} else {
show_admin_data($root);
}
break;
case 'del':
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
// Key untuk penghapusan data
$id = $_GET['id'];
// Lengkapi pernyataan SQL hapus data
$cnn = mysql_query($sql);
if ($cnn) { ?>
// Lengkapi script untuk redireksi ke root
<?php
} else {
echo 'Gagal menghapus data';
}
} else {
show_admin_data($root);
}
break;
default:
show_admin_data($root);
}
} else {
show_admin_data($root);
}
@mysql_close($cnn);
} else {
echo 'Data Tidak Ditemukan';
}
}

/**
* Fungsi untuk menampilkan menu administrasi
* @param string root parameter menu
*/
function show_admin_data($root) { ?>
<h2 class="heading" align="center">Administrasi Data</h2>
<?php
$sql = 'SELECT nim, nama, alamat FROM ' . MHS;
$cnn = mysql_query($sql);
if ($cnn) {
$num = mysql_num_rows($cnn);
if ($num) {
?>
<div class="tabel">
<div style="padding:5px;">
<a href="<?php echo $root;?>&amp;act=add"><p>
<button class="btn btn-large btn-primary" type="button"><span class="glyphicon glyphicon-plus"></span>
Tambah Data</button>
</a>
</div>
<div class ="container">
<div class="row-fluid"><br />
<table class = "table table-hover">
<tr class="success">
<th>#</th>
<th width=120>NIM</th>
<th width=200>Nama</th>
<th width=200>Alamat</th>
<th>Menu</th>
</tr>
<?php
$i = 1;
while ($row = mysql_fetch_row($cnn)) {
$bg = (($i % 2) != 0) ? '' : 'even';
$id = $row[0]; ?>
<tr class="<?php echo $bg;?>">
<td width="2%"><?php echo $i;?></td>
<td>
<a href="<?php echo $root;?>&amp;act=view&amp;id=
<?php echo $id;?>"
title="Lihat Data"><?php echo $id;?></a>
</td>
<td><?php echo $row[1];?></td>
<td><?php echo $row[2]?></td>
<td align="left">
 <a href="<?php echo $root;?>&amp;act=edit&amp;id=
<?php echo $id;?>"> <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>
Edit</button></a> |
<a href ="hapus.php"> Hapus
<!--
Lengkapi kode PHP untuk membuat link hapus data
-->
</td>

</tr>
<?php
$i++;
}
?>
</table>
</div>
<?php
} else {
echo 'Belum ada data,
isi <a href="'.$root.'&amp;act=add">di sini</a>';
}
@mysql_close($cnn);
}
}


/**
* Fungsi untuk menampilkan detail data mahasiswa
* @param string root parameter menu
* @param integer id nim mahasiswa
*/
function data_detail($root, $id) {
$sql = 'SELECT nim, nama, alamat
FROM ' . MHS .
' WHERE nim=' . $id;
$cnn = mysql_query($sql);
if ($cnn) {
if (mysql_num_rows($cnn)) { ?>
<div class="tabel">
<div class ="container">
<div class="row-fluid"><br /><br /><br />
<table class = "table table-hover">
<?php
$row = mysql_fetch_row($cnn); ?>
<tr class="danger">
<td>NIM</td>
<td><?php echo $row[0];?></td>
</tr>
<tr>
<td>Nama</td>
<td><?php echo $row[1];?></td>
</tr>
<tr>
<td>Alamat</td>
<td><?php echo $row[2];?></td>
</tr>
</div>
</table>

<?php
} else {
echo 'Data Tidak Ditemukan';
}
@mysql_close($cnn);
}
}

/**
* Fungsi untuk menghasilkan form penambahan/pengubahan
* @param string root parameter menu
* @param integer id nim mahasiswa
*/
function data_editor($root, $id = 0) {
$view = true;
if (isset($_POST['nim']) && $_POST['nim'] ) {
// Jika tidak disertai id, berarti insert baru
if (!$id) {
// Lengkapi Pernyataan PHP SQL untuk INSERT data

require_once './koneksi.php';
// Jika field nim dan nama diisi lalu disubmit
if (isset($_POST['nim']) && isset($_POST['nama'])) {
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
// Tambahkan data baru ke tabel
$sql = "INSERT INTO mahasiswa
VALUES ('" .$nim. "', '" .$nama. "', '" .$alamat. "' )";
$cnn = mysql_query($sql);
if ($cnn) {
echo 'Data Berhasil Ditambahkan';
@mysql_close($cnn);
} else {
echo 'Gagal Menambah Data <br />';
echo mysql_error();
}
}
echo '<hr />';
// Memanfaatkan script pengambilan data untuk
// menampilkan hasil
//require_once '../Lat3_seleksi_data.php';


$cnn = mysql_query($sql);
if ($cnn) { ?>
<script type="text/javascript">
document.location.href="<?php echo $root;?>";
</script>
<?php
                } else {
                        echo 'Gagal menambah data';
                }
                } else {
                        $nim = $_POST['nim'];
                        $nama = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $res = mysql_query("UPDATE mahasiswa SET nim='$nim', nama='$nama', alamat='$alamat' WHERE nim='$id'");
                        if ($res) { ?>
<script type="text/javascript">
document.location.href="<?php echo $root;?>";
</script>
<?php
                } else {
                        echo 'Gagal Modifikasi';
                }
                }
        }
        if ($view) {
                if ($id) {
                        $sql = "SELECT nim, nama, alamat FROM mahasiswa WHERE nim ='$id'";
                        $res = mysql_query($sql);
                        if ($res) {
                                if(mysql_num_rows($res)) {
                                        $row = mysql_fetch_row($res);
                                        $nim = $row[0];
                                        $nama = $row[1];
                                        $alamat = $row[2];
                                } else {
                                        show_admin_data();
                                        return;
                                }
                        }
                } else {
                        $nim = @$_POST['nim'];
                        $nama = @$_POST['nama'];
                        $alamat = @$_POST['alamat'];
                }
                ?>


<form action="" method="post">
<div class="tabel">
<div class ="container">
<div class="row-fluid"><br /><br /><br />
<h2> <?php echo $id ? 'Edit' : 'Tambah';?> Data</h2>
<table class = "table table-hover">
<tr class="success">
<td width=100>NIM*</td>
<td> <input type="text" name="nim" size=20
value="<?php echo $nim;?>" /> </td>
</tr>
<td>Nama</td>
<td> <input type="text" name="nama" size=40
value="<?php echo $nama;?>" /> </td>
</tr>
<tr class="success">
<td>Alamat</td>
<td> <input type="text" name="alamat" size=60
value="<?php echo $alamat;?>" /> </td>
</tr>

<table class = "table table-hover">

<td> </td>
<td><input type="submit" button class="btn btn-success"  value="Submit"/>
<input type="button" button class="btn btn-success" value="Cancel"
onclick="history.go(-1)" /></td>
</tr>
</table>

<p >Ket: * Harus diisi</p>
</div>
</div>
</form> <br />
<?php
}
return false;
}
?>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<script src="../../dist/js/jquery.js"></script>

</body>
</html>
