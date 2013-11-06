<?php 

	session_start();

	session_destroy();
	echo "Anda telah Logout <br />";
	echo " <a href='login.php'> << Back </a>";
?>