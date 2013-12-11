<html>

<head>
<title>Menciptakan Database</title>
</head>
<body>
<?php
require "koneksi.php";
echo '<br/>';
$res = mysql_query("CREATE TABLE pegawai (
nip VARCHAR(12) NOT NULL,
nm_depan VARCHAR(40) NOT NULL,
nm_akhir VARCHAR(100),
PRIMARY KEY(nip))");
if($res) {
echo '<br/>';
echo 'Tabel Dibuat';
} else {
echo mysql_error();
}
?>

</body>
</html>