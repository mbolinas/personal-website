<!DOCTYPE HTML>
<html>
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' href='nav.css'>
<style>
	.textInput{
		margin: 20px;
		width: 350px;
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
	
	
	.content{
		font-family: 'nxlight';
		font-size: 18px;
		text-align: center;
		color: white;
	}
	.buttonInput{
		color: rgb(200,200,200);
		background-color: rgba(0,0,0,0);
		border-style: solid;
		border-width: 1px;
		border-color: rgb(200,200,200);
		margin: 16px;
		width: 200px;
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
<div id='spacer'></div>


<div class='content' id='login'>
	<div id='title'>
		SIGN INTO YOUR ACCOUNT
	</div>
	<form action="db_tryLogin.php" method="POST">
		<input class="textInput" type="text" name="username" value="username" onfocus="if(this.value == 'username'){this.value=''}" onblur="if(this.value == ''){this.value='username'}"><br>
		<input class="textInput" type="text" name="password" value="password" onfocus="if(this.value == 'password'){this.value=''}" onblur="if(this.value == ''){this.value='password'}"><br>
		<input class='buttonInput' id="loginbutton" type="submit" value="LOGIN">
	</form>
</div>
<br>
<br>
<div class='content' id='signup'>
	<div id='title'>
		CREATE AN ACCOUNT
	</div>
	<form action="addUser.php" id="form">
		<input class='buttonInput' type="submit" id="signupbutton" value="CREATE ACCOUNT">
	</form>
</div>



</body>
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