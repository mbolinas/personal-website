<?php
	$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$msg = filter_var($_POST["msg"], FILTER_SANITIZE_STRING);
		
	$svname = "localhost";
	$user = "root";
	$pw = "";
	
	$conn = new PDO("mysql:host=$svname;dbname=rqx",$user,$pw);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$username = $_COOKIE['username'];

	$sql = "SELECT * FROM users WHERE
	username LIKE '$username'
	";
	$set = $conn->prepare($sql);
	$set->execute();
			
	$result = $set->setFetchMode(PDO::FETCH_ASSOC);
	$row = $set->fetch();
			
	$color = $row['color'];
	
	$msg = str_replace('Kappa','<img class="emote" src="pictures/emotes/kappa.png">',$msg);
	$msg = str_replace('WutFace','<img class="emote" src="pictures/emotes/wutface.png">',$msg);
	$msg = str_replace('EleGiggle','<img class="emote" src="pictures/emotes/elegiggle.jpg">',$msg);
	$msg = str_replace('LUL','<img class="emote" src="pictures/emotes/lul.png">',$msg);
	$msg = str_replace('SMOrc','<img class="emote" src="pictures/emotes/smorc.png">',$msg);
	
	
			
	if($msg == "!clear" && $row['privilege'] == true){
		$chatLog = fopen("chatlog.txt","w");
		$text = "<div style=\"color:" . $color . "\"><b>Welcome to Chat!</b><br><em>Chat has been cleared by an Admin!</em><br></div>" . "\n";
		fwrite($chatLog,$text);
		fclose($chatLog);
	}
	else if(strpos($msg, '!ban ') !== false && $row['privilege'] == true){
		$msg = str_replace('!ban ','',$msg);
		

		$sql = "DELETE FROM users WHERE username LIKE '%$msg%' AND (privilege LIKE 'false')";
		$conn->exec($sql);
		
		$chatLog = fopen("chatlog.txt","a");
		$text = "<div style=\"color:" . $color . "\"><b>" . $name . "</b>" . " has banned " . $msg . "<br></div>" . "\n";
		fwrite($chatLog,$text);
		fclose($chatLog);
	}
	else if($name != null && $msg != null){
		$chatLog = fopen("chatlog.txt","a");
		$text = "<div style=\"color:" . $color . "\"><b>" . $name . "</b>" . "~~ " . $msg . "<br></div>" . "\n";
		fwrite($chatLog,$text);
		fclose($chatLog);
	}
		
?>