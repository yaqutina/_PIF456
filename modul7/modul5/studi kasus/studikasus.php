<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                
                <title>Pemrograman Web</title>
   
    <!-- Bootstrap -->
    <link href="../../dist/css/bootstrap.css"rel="stylesheet" media="screen">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" media="screen">

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
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    $rec_limit = 5;

        if(! $conn )
            {
                die('Could not connect: ' . mysql_error());
            }
        
        mysql_select_db('myweb');
        $sql = "SELECT count(nim) FROM mahasiswa ";
        $retval = mysql_query( $sql, $conn );
         if(! $retval )
                        {
                die('Could not get data: ' . mysql_error());
                        }
                        
        $row = mysql_fetch_array($retval, MYSQL_NUM );
        $rec_count = $row[0];
    if( isset($_GET{'page'} ) )
                {
                        $page = $_GET{'page'} + 1;
                        $offset = $rec_limit * $page;
        }
    else
       {
                        $page = 0;
                        $offset = 0;
                }
                
        $left_rec = $rec_count - ($page * $rec_limit);
        
        $sql = "SELECT nim, nama, alamat ".
                        "FROM mahasiswa ".
                        "LIMIT $offset, $rec_limit";

        $retval = mysql_query( $sql, $conn );
        if(! $retval )
                {
                        die('Could not get data: ' . mysql_error());
                }
?>


<div class="container">
<div class="row-fluid"><br>
<h2> Daftar Mahasiswa</h2>

<table class="table table-hover">
<tr class="success">
    <th width=50>#</th>
    <th width=120>NIM</th>
    <th width=200>Nama</th>
    <th width=200>Alamat</th>
</tr>
<div class="pagination pagination-centered">        
        
<?php
    	$i=0;    
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
        {
	
        $i++;
?>
        <tr>
                <td>
                        <?php echo $i; ?>
                </td>
                <td>
                        <?php echo $row['nim']; ?>
                </td>
                <td>
                        <?php echo $row['nama']; ?>
                </td>
                <td>
                        <?php echo $row['alamat']; ?>
                </td>
        </tr>
  
<?php

        
		}
?>


</table>


<?php

        if( $page > 0 )
                {
            $last = $page - 2;
            echo "<a href=\"?page=$last\">Last 5 Records</a> |";
            echo "<a href=\"?page=$page\">Next 5 Records</a>";
        }
     else if( $page == 0 )
        {
            echo "<a href=\"?page=$page\">Next 5 Records</a>";
        }
        else if( $left_rec < $rec_limit )
                {
            $last = $page - 2;
            echo "<a href=\"?page=$last\">Last 5 Records</a>";
        }
    mysql_close($conn);
?>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<script src="../../dist/js/jquery.js"></script>
</body>
</html>
</div>
</body>
</html>