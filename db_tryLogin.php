<?php
	$svname = "localhost";
	$user = "root";
	$pw = "";
	
	$conn = new PDO("mysql:host=$svname;dbname=rqx",$user,$pw);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE
	username LIKE '$username' AND password LIKE '$password'
	";
	$set = $conn->prepare($sql);
	$set->execute();
	
	$result = $set->setFetchMode(PDO::FETCH_ASSOC);
	$row = $set->fetch();
	
	
	if(isset($row['username'])){
		setcookie("username",$_POST['username'], time() + (86400), '/');
		setcookie("password",md5($_POST['password']), time() + (86400), '/' );
		header('Location: home.php');
		
	}
	else{
		header('Location:failedToLogin.php');
	}
?>
