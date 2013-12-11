<!DOCTYPE html>
<html>
	<head>
    	<title>Bootstrap 101 Template</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="../../dist/css/bootstrap.css" rel="stylesheet" media="screen">
	    <link href="../../dist/css/bootstrap-theme.min.css" media="screen">
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
	<a class="navbar-brand" href="../../index.php"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-home"></span>Home</button></a>
	
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
          <li><a href="modul6/index.php">Export</a></li>
          <li><a href="#">Import</a></li>
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
	    <script src="http://code.jquery.com/jquery.js"></script>
    	<script src="../../dist/js/bootstrap.min.js"></script>
		<script src="../../dist/js/jquery.js"></script>
	
	</body>
</html>
<?php
function data_handler($root) {
		if (isset($_GET['act']) && $_GET['act'] == 'add') {
                data_editor($root);
                return;
        }
        $res = mysql_query("SELECT count(*) AS total FROM " . MHS );
        if(mysql_num_rows($res)) {
                if(isset($_GET['act']) && $_GET['act'] != '') {
                        switch ($_GET['act']) {
                                case 'edit':
                                        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
                                                data_editor($root, $_GET['id']);
                                        } else {
                                                show_admin_data($root);
                                        }
                                        break;
                                case 'view':
                                        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
                                                data_detail($root, $_GET['id'], 1);
                                        } else {
                                                show_admin_data($root);
                                        }
                                        break;
                                case 'del':
                                        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
                                                $id = $_GET['id'];
                                                $sql = "DELETE FROM mahasiswa WHERE nim='$id'";
                                                $res = mysql_query($sql);
                                                if ($res) {                                                      
                                                        ?>
														<?php
                                                } else {
                                                        echo 'Gagal menghapus data';
                                                }
                                        } else {
                                                show_admin_data($root);
                                        }
										show_admin_data($root);
                                        break;
                                default:
                                        show_admin_data($root);
                                        break;
                        }
                } else {
                        show_admin_data($root);
                }
                @mysql_close(res);
        } else {
                echo 'Data Tidak ditemukan';
        }
}

function show_admin_data($root) { ?>
	<h2 class="heading" align ="center"> Administrasi Data</h2>
	<?php
    $sql = 'SELECT nim, nama, alamat FROM mahasiswa';
    $res = mysql_query($sql);
    if($res) {
	  	$num = mysql_num_rows($res);
        if ($num) {
     	?>
	        <div class="tabel">
    	        <div style="padding:5px;">              
            </div>
            <div class="container">
            	<div class="row-fluid"><br>
                	<h3> Daftar Mahasiswa</h3>
                    	
                        <a href="<?php echo $root; ?>&amp;act=add"><button class="btn btn-primary" type="button"> <span class="glyphicon glyphicon-plus-sign"></span>  Tambah Data</button></a><br><br>
                        <table class="table table-hover">
                        	<tr class="success">
                        		<th>#</th>
		                        <th width=120>NIM</th>
		                        <th width=200>Nama</th>
		                        <th width=200>Alamat</th>
		                        <th width=200>Menu</th>
        	                </tr>
							<?php
							$i=1;
							while($row = mysql_fetch_row($res)) {
							$bg = (($i % 2) != 0) ? '' : 'even';
							$id = $row[0]; ?>
							<tr class="<?php echo $bg; ?>">
								<td width="2%"><?php echo $i;?></td>
								<td>
									<a href="<?php echo $root;?>&amp;act=view&amp;id=<?php echo $id;?>" title="Lihat Data"><?php echo $id;?></a>
								</td>
								<td><?php echo $row[1];?></td>
                                <td><?php echo $row[2];?></td>
								<td align="left">
									<a href ="<?php echo $root;?>&amp;act=edit&amp;id=<?php echo $id;?>"><button class="btn btn-primary" type="button"> <span class="glyphicon glyphicon-pencil"></span> Edit</button></a>
									<a href ="<?php echo $root;?>&amp;act=del&amp;id=<?php echo $id;?>" onClick="return konfirm('<? echo $id;?> ')"><button class="btn btn-primary" type="button"> <span class="glyphicon glyphicon-remove"></span>Hapus</button></a>
								</td>
							</tr>
							<?php
							$i++;
							}
							?>
						</table>
					</div>
				</div>	
			</div>
			<?php
        } else {
                echo 'Belum ada data, isi <a href="' . $root.'&amp;act=add">di sini</a>';
        }
        mysql_close();
        }
}

function data_detail($root, $id) {
        $sql = "SELECT nim, nama, alamat FROM mahasiswa WHERE nim ='$id'";
        $res = mysql_query($sql);
        if($res) {
                if (mysql_num_rows($res)) { ?>
                    <div class="row-fluid">
                    	<div class="container">
                            <table class="table table-hover">
                                <?php
                                $row = mysql_fetch_row($res); ?>
                                <tr>
                                    <td>NIM</td>
                                    <td><?php echo $row[0];?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?php echo $row[1];?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $row[2];?></td>
                                </tr>
                            </table>
                    	</div>
                    </div>
                    <?php
                } else {
                        echo 'Data Tidak Ditemukan';
                }
                mysql_close();
        }
}

function data_editor($root, $id = 0) {
        $view = true;
        if(isset($_POST['nim']) && $_POST['nim']) {
                if (!$id) {
                        $nim = $_POST['nim'];
                        $nama = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $res = mysql_query("INSERT INTO mahasiswa VALUES ('".$nim."', '" .$nama."', '" .$alamat."')");
                        if($res) { ?>
							<script type="text/javascript">
                            document.location.href="<?php echo $root;?>";
                            </script>
                            <?php
                		} else {
                        echo 'Gagal menambah data';
                		}
               	} else {
                        $nim = $_POST['nim'];
                        $nama = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $res = mysql_query("UPDATE mahasiswa SET nim='$nim', nama='$nama', alamat='$alamat' WHERE nim='$id'");
                        if ($res) { ?>
							<script type="text/javascript">
                            document.location.href="<?php echo $root;?>";
                            </script>
                            <?php
                } else {
                        echo 'Gagal Modifikasi';
                }
                }
        }
        if ($view) {
                if ($id) {
                        $sql = "SELECT nim, nama, alamat FROM mahasiswa WHERE nim ='$id'";
                        $res = mysql_query($sql);
                        if ($res) {
                                if(mysql_num_rows($res)) {
                                        $row = mysql_fetch_row($res);
                                        $nim = $row[0];
                                        $nama = $row[1];
                                        $alamat = $row[2];
                                } else {
                                        show_admin_data();
                                        return;
                                }
                        }
                } else {
                        $nim = @$_POST['nim'];
                        $nama = @$_POST['nama'];
                        $alamat = @$_POST['alamat'];
                }
                ?>
                <div class="row-fluid">
                    <div class="container">
                    <div class="hero-unit">
                <h2> <?php echo $id ? 'Edit' : 'Tambah';?> Data </h2>
                <form action="" method="post">
                <table class="table table-hove">
                <tr>
                <td width=100>NIM*</td>
                <td><input type="text" name="nim" size=20 value="<?php echo $nim;?>"/></td>
                </tr>
                <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" size=40 value="<?php echo $nama;?>"/></td>
                </tr>
                <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" size=60 value="<?php echo $alamat;?>"/></td>
                </tr>
                <tr>
                
                <td> <button type= "Submit" class="btn btn-info" type="button">Submit</button> </td>
				<td><button class="btn btn-info" type="button" onClick="history.go(-1)">Cancel</button></td>
                </tr>
                </table>
                </form> <br/>
                <p> Ket: * Harus diisi</p>
                <?php
        }
        return false;
        }

?>


    