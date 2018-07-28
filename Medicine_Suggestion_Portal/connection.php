<?php
session_start();

// Define database
//define('dbhost', 'localhost');
//define('dbuser', 'rafi');
//define('dbpass', '123456');
//define('dbname', 'medicine information management system');

// Connecting database
try {
	$connect = new PDO('mysql:host=localhost; dbname=medicine information management system; charset=utf8', 'root', '');
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}
?>
