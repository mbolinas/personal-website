<!DOCTYPE HTML>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' href='nav.css'>
<style>	
	.navbar{
		background-color: rgba(0,0,0,0);
	}
	.nav{
		background-color: rgba(0,0,0,0);
	}
	.nav:hover{
		color: gold;
		//background-color: rgba(0,0,0,.6);
	}
	
	
	#content{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
		color: white;
	}
	.title{
		font-family: 'nxlight';
		font-size: 32px;
	}
	.text{
		font-family: 'nxlight';
		font-size: 18px;
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

<div id="content">
	<div class='title'>
		WELCOME TO MY WEBSITE
	</div>
	<div class='text'>
		<em>
		"Hey that's a nice aesthetic"
		<em>
	</div>
</div>

</body>
<script>
	$(document).ready(function(){
		$('#loading').fadeOut(1000);
	});
</script>
</html>