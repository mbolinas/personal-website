<?php
$svname = "localhost";
$user = "root";
$pw = "";

try{
	$conn = new PDO("mysql:host=$svname;dbname=rqx",$user,$pw);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_POST['privilege'])){
		if($_POST['privilege'] == 'true'){
			$priv = 'true';
		}
		else{
			$priv = 'false';
		}
	}
	else{
		$priv = 'false';
	}
	
	$sql = "INSERT INTO users (username,password,privilege,color)
		VALUES
		(" . "'" . $_POST['username'] . "'" . "," . "'" . $_POST['password'] . "'" . "," . "'" . $priv . "'" . "," . "'" . $_POST['color'] . "'" . ")
	";
	$conn->exec($sql);
	header('Location: home.php');
	echo "<script>alert('User successfully created');</script>";
}
catch(PDOException $e){
	echo "Failed to add user to database! <br> " . $e->getMessage();
}
?>
