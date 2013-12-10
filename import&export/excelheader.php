<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=namafile.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Satu</td>
        <td>Alamat</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Dua</td>
        <td>Alamat</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Tiga</td>
        <td>Alamat</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Empat</td>
        <td>Alamat</td>
    </tr>
</table>