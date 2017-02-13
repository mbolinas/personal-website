<!DOCTYPE HTML>
<html>
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' href='nav.css'>
<style>
	#fix{
		padding-top: 200px;
		height: 100%;
		width: 100%;
		text-align: center;
	}
	#content{
		height: 100%;
		margin: auto;
		width: 80%;
		font-family: 'nxlight';
		display: none;
		height: 100%;
		text-align: center;
		color: white;
	}
	
	#chat{
		min-height: 40%;
		max-height: 40%;
		height: 40%;
		padding-bottom: 20px;
		padding-top: 20px;
		border-bottom-style: solid;
		border-bottom-width: 1px;
		border-bottom-color: white;
	}
	
	#input{
		padding: 20px;
	}
	.textInput{
		display: block;
		margin: auto;
		width: 40%;
		background-color: rgba(0,0,0,0);
		text-align: center;
		color: rgb(200,200,200);
		
		margin-top: 8px;
		margin-bottom: 8px;
		
		font-family: 'nxlight';
		font-size 14px;
		height: 36px;
		
		border-style: none;
		border-bottom-style: solid;
		border-bottom-width: 1px;
		border-bottom-color: rgb(150,150,150);
		
		-webkit-transition: border-bottom-color .25s, color .25s;
		transition: border-bottom-color .25s, color .25s;
	}
	.textInput:focus{
		color: white;
		border-bottom-color: gold;
		outline: none;
	}
	.textInput:hover{
		color: white;
		border-bottom-color: gold;
		outline: none;
	}
	
	.buttonInput{
		color: rgb(200,200,200);
		background-color: rgba(0,0,0,0);
		border-style: solid;
		border-width: 1px;
		border-color: rgb(200,200,200);
		margin: 16px;
		width: 40%;
		height: 40px;
		
		-webkit-transition: color .25s, border-color .25s, background-color .25s;
		transition: color .25s, border-color .25s, background-color .25s;
	}
	.buttonInput:hover{
		color: white;
		border-color: gold;
		background-color: rgba(0,0,0,.6);
	}
</style>
</head>
<body>
<div id='loading'></div>
<div class="navbar">
		<button class="nav navCenter" type="button" onclick="location.href='home.php'">HOME</button>
		<button class="nav navLeft" type="button" onclick="location.href='news.php'">NEWS</button>
		<button class="nav navLeft" type="button" onclick="location.href='photos.php'">PHOTOS</button>
		<button class="nav navLeft" type="button" onclick="location.href='chat.php'">CHAT</button>
		<button class="nav navRight" type="button" onclick="location.href='links.php'">LINKS</button>
		<button class="nav navRight" type="button" onclick="location.href='about.php'">ABOUT</button>
		<button class="nav navRight" type="button" onclick="location.href='login.php'">SIGN IN</button>
</div>
<div id='unused'></div>

<div id='fix'>
	<div id='content'>
		<div id='chat'>
	
		</div>
		<div id='input'>
			<input type='text' class='textInput' value='message' id='chatText'
				onfocus="if(this.value == 'message'){this.value=''}" 
				onblur="if(this.value == ''){this.value='message'}">
			<input type='button' class='buttonInput' value='SEND' id='chatButton'>
		</div>
	</div>
</div>

</body>

<script>

<?php
		if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
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
			
			$password = $row['password'];
			
			if($_COOKIE['password'] == md5($password)){
				echo "$('#content').css('display','block');";
			}
		}
?>


$(document).ready(function(){		
	$("#chatText").keyup(function(event){
		if(event.keyCode == 13){
			$("#chatButton").click();
		}
	});		
	$("#chatButton").click(function(){
		$.post("chatWrite.php",{
			name: <?php echo ("\"" . $_COOKIE['username'] . "\"") ?>,
			msg: $("#chatText").val()
		});
		$.get("chatPull.php",function(data, status){
			$("#chat").html(data);
		});
		$("#chatText").val("");	
	});
});
	var scrollDist;
	setInterval(function(){
		$(document).ready(function(){
			$.get("chatPull.php",function(data, status){
				$("#chat").html(data);
			});
			scrollDist = $("#chat").scrollTop()+$("#chat").css("height");
			$("#chat").animate({
				scrollTop: scrollDist},
				800
			); 
		})
	},1000);
</script>

<script>
	$(document).ready(function(){
		$('#loading').fadeOut(1000);
	});
	var didScroll;
	var lastScrollTop = 0;
	var navbarHeight = ($('.navbar').height()) / 2;
	$(window).scroll(function(event){
		didScroll = true;
	});
	setInterval(function(){
		if(didScroll){
			updateNavbar();
			didScroll = false;
		}
	},200);
	function updateNavbar(){
		var st = $(this).scrollTop();
		if(st > lastScrollTop && st > navbarHeight){
			$('.navbar').addClass('navbar-up');
		}
		else{
			$('.navbar').removeClass('navbar-up');
		}
		lastScrollTop = st;
	}
</script>
</html>