<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                
<title>PENGURUTAN DESCENDING DAN ASCENDING</title>

</head>

<body><

<table border="1" width="500px">                        
<?php
require "koneksi.php";
$query1="select * from mahasiswa order by nim ";
$sort='asc';
$sort2='asc';
if(isset($_GET['orderby'])){
        $orderby=$_GET['orderby'];
        $sort=$_GET['sort'];
        
        $query1="SELECT * FROM mahasiswa order by $orderby $sort ";
        if($sort=='asc'){
                $sort2='desc';
                
        }else{
                $sort2='asc';
        }
}
?>
<th>
    <td><a href='tg.php?orderby=nim&sort=<?=$sort2;?>'>Nim</a></td>
    <td><a href='tg.php?orderby=nama&sort=<?=$sort2;?>'>Nama</a></td>
	<td>Alamat</a></td>
</th>
                                
<?php
$result=mysql_query($query1) or die(mysql_error());
$no=1;
while($rows=mysql_fetch_object($result)){
    ?>
    <tr>
    <td><?php echo $no
    ?></td>
    <td><?php                echo $rows -> nim;?></td>
    <td><?php                echo $rows -> nama;?></td>
    <td><?php                echo $rows -> alamat;?></td>
    </tr>
    <?php
$no++;
}?>
       </table>   
</body>
</html>