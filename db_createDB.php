<?php
$svname = "localhost";
$user = "root";
$pw = "";

try{
	echo "-<br>";
	$conn = new PDO("mysql:host=$svname;dbname=rqx",$user,$pw);
	echo "Connection Established<br>";
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	$sql = "CREATE TABLE users (
		id INT(6) UNSIGNED AUTO_INCREMENT,
		username VARCHAR(30) NOT NULL,
		password VARCHAR(30) NOT NULL,
		privilege VARCHAR (30) NOT NULL,
		color VARCHAR(30) NOT NULL,
		
		CONSTRAINT pk_usersid PRIMARY KEY(id)
	)";
	$conn->exec($sql);
	
	echo "Table created <br>";
	
	$sql = "INSERT INTO users 
		(username, password, privilege, color)
		VALUES
		('Admin','123','true','red')";
	$conn->exec($sql);
	echo "Username: Admin<br>Password: 123<br>";
}
catch(PDOException $e){
	echo "<b>Failed to create database!</b> <br>Error message:<br> " . $e->getMessage();
}
?>