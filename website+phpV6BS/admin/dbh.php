<?php

// CONNECT TO THE DATABASE
$DB_NAME = 'groupproject';
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';

//Creating a new instance of the mysqli function and passing the above parameters.
//Then storing it within an array.
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

//Returns the last error code number from the last call to mysqli_connect().
if (mysqli_connect_errno()) {

	//Return an error description from the last connection error, if any
	//and print it to screen.
  	printf("Connect failed: %s\n", mysqli_connect_error());
  	//Exit script.
  	exit();
}



?>