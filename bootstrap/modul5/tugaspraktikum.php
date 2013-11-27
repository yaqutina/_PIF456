<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Praktikum Pemrograman Web</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../dist/css/bootstrap.css" rel="stylesheet" media="screen">
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
    <a class="navbar-brand" href="#"> Praktikum Pemrograman Web</a>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Modul 4 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="../modul4/studikasus.php">Studi Kasus</a></li>
          <li><a href="../modul4/tugas/login.php">Tugas Praktikum</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Modul 5 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="studikasus.php">Studi Kasus</a></li>
          <li><a href="tugaspraktikum.php">Tugas Praktikum</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href = "#"  class ="dropdown-toggle" data-toggle="dropdown">
    		<span class="glyphicon glyphicon-user"></span>
			    yaqutinamarjani
    		<b class="caret"></b> 						
        </a>
    	<ul class="dropdown-menu">
		    <li><a href="#">My Profile</a></li>
    	</ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
	<script src="../dist/js/jquery.js"></script>
	<script src="../dist/js/bootstrap-transition.js"></script>
    <script src="../dist/js/bootstrap-dropdown.js"></script>
    <script src="../dist/js/bootstrap-collapse.js"></script>
    <script src="../dist/js/application.js"></script>
    <script src="../dist/js/bootstrap-button.js"></script>

<div class="container">
<div class="row-fluid"><br>
<h2> Daftar Mahasiswa</h2>
<table class="table table-hover">
<tr class="success">
</tr>
                <?php
                        require "koneksi.php";
                        $query1 = "SELECT * FROM mahasiswa ORDER BY nim ";
                        $urut = 'asc';
                        $urutbaru = 'desc';
                        if(isset($_GET['orderby'])){
                                $orderby=$_GET['orderby'];
                                $urut=$_GET['urut'];
                                
                                $query1="SELECT * FROM mahasiswa order by $orderby $urut ";
                                if($urut=='asc'){
                                        $urutbaru='desc';                                        
                                }else{
                                        $urutbaru='asc';
                                }
                        }
                ?>
                <th>
                        <td><a href='tugaspraktikum.php?orderby=nim&urut=<?=$urutbaru;?>'>Nim</a></td>
                        <td><a href='tugaspraktikum.php?orderby=nama&urut=<?=$urutbaru;?>'>Nama</a></td>
                        <td><a href='tugaspraktikum.php?orderby=alamat&urut=<?=$urutbaru;?>'>Alamat</a></td>
                </th>
                                                        
                <?php
                        $result = mysql_query($query1) or die (mysql_error());
                        $no = 1;
                        while($rows=mysql_fetch_object($result)){
                ?>

                <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $rows -> nim;?></td>
                        <td><?php echo $rows -> nama;?></td>
                        <td><?php echo $rows -> alamat;?></td>
                </tr>
                
                <?php
                        $no++;
                        }
                ?>

        </table>
</body>
</html>
