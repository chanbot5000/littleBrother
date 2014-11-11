<?php

	
	ini_set('display_errors', 1);

	error_reporting(E_ALL);
	

	$host = "dev.indulgencelabs.com"; 
	$user = "postgres"; 
	$pass = "juanpfm!"; 
	$db = "littlebrother";

	
	$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
	or die ("Could not connect to server\n"); 
		
	$latlng = $_GET['latlng'];

	$description = $_GET['description'];
	//$point = $lat . ' ' . $lng;

	$query = "INSERT INTO pending VALUES('" . $description . "', " . "'POINT(" . $latlng . ")');";

	echo $query;
	//echo($lat . " " . $lng);

	//perform the insert using pg_query
	//$result = pg_query($con, $query);

	//dump the result object
	var_dump($result);

	// Closing connection
	pg_close($con);
	
	
	

?>