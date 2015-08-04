<?php 
	$dbhost = 'localhost';
	$dbname = 'videodb';
	$dbuser = 'root';
	$dbpass = '';

	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if (!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
?>