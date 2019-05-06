<?php

	$server	    = "localhost";
	$user 		= "root";
	$pass 		= "bina6939";
	$db 		= "siscad_aafc";

	$conexaoDB = mysql_connect($server, $user, $pass);
	mysql_select_db($db,$conexaoDB);
?>