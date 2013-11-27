<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pencarian Data</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../dist/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="../dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar navbar-inverse">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Praktikum Pemrograman Web</a>
	



  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Modul 4 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="modul4/studikasus.php">Studi Kasus</a></li>
          <li><a href="tugas/login.php">Tugas Praktikum</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Modul 5 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="../modul5/studikasus.php">Studi Kasus</a></li>
          <li><a href="../modul5/tugaspraktikum.php">Tugas Praktikum</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href = "#"  class ="dropdown-toggle" data-toggle="dropdown">
    							<span class="glyphicon glyphicon-user"></span>
			    					yaqutinamarjani
    		<b class="caret"></b>					
                                </a>
    						<ul class="dropdown-menu">
							    <li><a href="#">Profille</a></li>
    						</ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->

</nav>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
	<script src="../dist/js/jquery.js"></script>
	<script src="../dist/js/bootstrap-transition.js"></script>
    <script src="../dist/js/bootstrap-dropdown.js"></script>
    <script src="../dist/js/bootstrap-collapse.js"></script>
    <script src="../dist/js/bootstrap-button.js"></script>
</body>
</html>
<?php
    if (isset($_GET['nama'])) {
    require_once './koneksi.php';
    // Kata kunci pencarian
    $key = $_GET['nama'];
    // Variabel $sql berisi pernyataan SQL pencarian
    $sql = "SELECT * FROM mahasiswa
    WHERE nama = '$key'";
    $res = mysql_query($sql);
    if ($res) {
    $num = mysql_num_rows($res);
    if ($num) {
    echo 'Ditemukan ' . $num . ' row(s)'; ?>
    <div class="container">
	<div class="row-fluid"><br>
    <table class="table table-hover">
	<tr class="success">
    <th>#</th>
    <th width=100>NIM</th>
    <th width=150>Nama</th>
    <th>Alamat</th>
    </tr>
    <?php
    $i = 1;
    while ($row = mysql_fetch_row($res)) { ?>
    <tr>
    <td>
    <?php echo $i;?>
    </td>
    <td>
    <?php echo $row[0];?>
    </td>
    <td>
    <?php echo $row[1];?>
    </td>
    <td>
    <?php echo $row[2];?>
    </td>
    </tr>
    <?php
    $i++;
    }
    ?>
    </table>
    <?php
    } else {
    echo 'Data Tidak Ditemukan';
    }
    }
    } else {
    
    }
    ?>
