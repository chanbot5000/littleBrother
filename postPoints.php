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
	$point = $lng . ' ' . $lat; 
	$description = $_GET['description'];
	$imgName = $_GET['imgName'] . '.jpg';
	$cameraType = $_GET['cameraType'];
	$imgUrl = 'http://lb.indulgencelabs.com/img/' . $imgName;
	

	//test vars
	/*
	$lat = -118;
	$lng = 34;
	$point = $lat . ' ' . $lng;
	$description = 'testing description';
	$imgName = 'asdfadsfadsf';
	$cameraType = 'public';
	*/
	
    //geography
	//$query = "INSERT INTO pending VALUES(ST_GeographyFromText('SRID=4326;POINT(" . $point . ")'), '" . $description . "','no', '" . $imgName . "', '" . $cameraType . "');";
	
	//geometry
	$query = "INSERT INTO pending VALUES(ST_GeomFromText('POINT(" . $point . ")',4326), '" . $description . "','no', '" . $cameraType . "', '" . $lng . "', '" . $lat . "', '" . $imgName . "', '" . $imgUrl . "');";
	
	//INSERT INTO pending VALUES ('POINT(-118, 36)');
	echo $query;
	//perform the insert using pg_query
	$result = pg_query($con, $query);

	//dump the result object
	var_dump($result);

	// Closing connection
	pg_close($con);

?>