<!DOCTYPE HTML>
<html>
<head>
	<title>Import</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css">
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
	<a class="navbar-brand" href="../index.php"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-home"></span>Home</button></a>
	
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
    	<h2 class="heading">IMPORT DATA MAHASISWA</h2>
      	<form method="post" enctype="multipart/form-data" action="proses.php">
        	Upload File dengan ekstensi .xls : <input name="input" type="file" class="btn btn-mini btn-info"  placeholder="" required> <br>
            <button type="submit" class="btn btn-info" name="upload">Import</button>
		</form>
     </div>
</div>     
<script src="../dist/js/bootstrap.min.js"></script>
	<script src="../dist/js/jquery.js"></script>
	</body>
</html>