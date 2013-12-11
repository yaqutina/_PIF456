<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link href="../../dist/css/bootstrap.min.css">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Modul 5 | Tugas Praktikum</title>
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

        <table class = "table table-hover">

                <?php
                        require "./koneksi.php";
                        $query1 = "SELECT * FROM mahasiswa ORDER BY nim ";
                        $urut = 'asc';
                        $urutbaru = 'asc';
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
                        <td><a href='prak.php?orderby=nim&urut=<?=$urutbaru;?>'><button class="btn btn-small btn-primary" type="button"><span class="glyphicon glyphicon-arrow-up"><span class="glyphicon glyphicon-arrow-down"></span>NIM</button></a></td>
                        <td><a href='prak.php?orderby=nama&urut=<?=$urutbaru;?>'><button class="btn btn-small btn-primary" type="button"><span class="glyphicon glyphicon-arrow-up"><span class="glyphicon glyphicon-arrow-down"></span>NAMA</button></a></td>
                         <td><a href='prak.php?orderby=alamat&urut=<?=$urutbaru;?>'><button class="btn btn-small btn-primary" type="button"><span class="glyphicon glyphicon-arrow-up"><span class="glyphicon glyphicon-arrow-down"></span>ALAMAT</button></a></td>
                </th>
                                                        
                <?php
                        $result = mysql_query($query1) or die (mysql_error());
                        $no = 1;
                        while($rows=mysql_fetch_object($result)){
                ?>


                <tr class="success">
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
		<script src="../../dist/js/bootstrap.min.js"></script>
	<script src="../../dist/js/jquery.js"></script>
</body>
</html>