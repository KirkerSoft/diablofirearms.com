<?php
$host = "localhost";
$dbname = "diabloFirearms";
$username = "root"; // johnl
$password = "Pa1na55e5!"; // WSiaB6425

//establishes database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

//shows errors when connecting to database
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>
