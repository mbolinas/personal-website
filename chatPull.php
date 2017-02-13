<?php
$chatLog = fopen("chatlog.txt","r");
	echo fread($chatLog,filesize("chatlog.txt"));
	fclose($chatLog);
?>