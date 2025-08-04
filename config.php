<?php
	
	$username = "c##tousif";
	$password = "tousif";

	$connection_string = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=localhost)(PORT=1521))(CONNECT_DATA=(SERVICE_NAME=xe)))";



	$conn = oci_connect($username, $password, $connection_string);

	if(!$conn){
		$err = oci_error();
		die("Connection Failed: " . htmlentities($err['message'], ENT_QUOTES));
	}
?>