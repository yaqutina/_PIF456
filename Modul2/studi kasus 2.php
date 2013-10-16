<html>
<head><title>Identifikasi Metode</title></head>
<body>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
Pilih warna favorit anda :<br/>
<input type="checkbox" name="warna1" value="Merah" checked/>Merah <br/>
<input type="checkbox" name="warna2" value="Kuning"/>Kuning <br/>
<input type="checkbox" name="warna3" value="Hijau"/>Hijau <br/>
<input type="checkbox" name="warna4" value="Biru"/>Biru <br/>
<input type="checkbox" name="warna5" value="Ungu"/>Ungu <br/>
<input type="submit" value="Submit"/>
</form>
<?php
if(isset($_POST['warna1'])) {
echo $_POST['warna1'];
echo "<br/>";
}
if(isset($_POST['warna2'])) {
echo $_POST['warna2'];
echo "<br/>";
}
if(isset($_POST['warna3'])) {
echo $_POST['warna3'];
echo "<br/>";
}
if(isset($_POST['warna4'])) {
echo $_POST['warna4'];
echo "<br/>";
}
if(isset($_POST['warna5'])) {
echo $_POST['warna5'];
echo "<br/>";
}
?>
</body>
</html>