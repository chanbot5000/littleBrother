<?php

	
	ini_set('display_errors', 1);

	error_reporting(E_ALL);
	

	$host = "127.0.0.1"; 
	$user = "lb_writer"; 
	$pass = "lbwr1t3r"; 
	$db = "littlebrother";

	
	$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
	or die ("Could not connect to server\n"); 
	
	$lat = $_GET['lat'];
	$lng = $_GET['lng'];
	$point = $lat . ' ' . $lng; 
	$description = $_GET['description'];	

	$query = "INSERT INTO pending VALUES('POINT(" . $point . ")', '" . $description . "','no');";

	//perform the insert using pg_query
	$result = pg_query($con, $query);

	//dump the result object
	var_dump($result);

	// Closing connection
	pg_close($con);

?>