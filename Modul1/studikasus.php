<html>
<head><title>Greeting</title></head>
<body>
<?php

echo"GREETING";
echo "<br/>";
echo "<br/>";
function greeting($a) {

echo "<br/>";
if ($a > ("00:00") and $a < ("9:00")) {
echo "Selamat Pagi";
}
elseif ($a > ("9:01") and $a < ("14:00")) {
echo "Selamat Siang";
}
elseif ($a > ("14:01") and $a < ("18:00")) {
echo "Selamat Sore";
}
elseif ($a > ("18:01") and $a < ("23:59")) {
echo "Selamat Malam";
}
else {
echo "Maaf anda salah";
}
}
$waktu = date("H:i");
echo $waktu;
greeting($waktu);
?>
</body>
</html>