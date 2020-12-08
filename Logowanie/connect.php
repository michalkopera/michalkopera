<?php
    $servername = "localhost";
	$dbname = "miko_weryfikacja";
	$username = "miko_root";
	$password = "12345";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("Cos nie tak ". mysqli_connect_error());
	}
	
?>