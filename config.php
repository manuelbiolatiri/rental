<?php

	define('DB_SERVERNAME', '127.0.0.1');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DBASE', 'rent_db');

	$con = mysqli_connect(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_DBASE);
	// if($con){
	// 	echo "successful";
	// }

?>