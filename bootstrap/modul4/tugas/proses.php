<?php

//Pemanggilan session
session_start();
    //Simulasi data account nama dan password
    $nama = 'yaqut';
    $pass = 'tina'; 

    if (isset($_POST['nama']) && isset ($_POST['pass'])){
        $n = trim($_POST['nama']);
        $p = trim($_POST['pass']);

        if(($n===$nama) && ($p ===$pass)){         

header("location:data.php");
            
if(!isset($_SESSION['nlogin']) || !isset($_SESSION['time'])){
                $_SESSION['nlogin'] = $n;
                $_SESSION['time'] = time();
            }
            ?>
            <script type="text/javascript">
            document.location.href="./";
            </script>
            <?php
            }
            else {
                echo "<script>alert('Nama atau Password Yang Anda Masukkan Salah');history.go(-1)
				</script>";
                return false;
            }
        }
		
