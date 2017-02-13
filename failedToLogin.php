<!DOCTYPE HTML>
<html>
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' href='nav.css'>
</head>
<style>
	#content{
		font-family: 'nxlight';
		font-size: 18px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
		color: white;
	}
</style>
<body>
<div id='loading'></div>
<div class="navbar">
		<button class="nav navCenter" type="button" onclick="location.href='home.php'">HOME</button>
		<button class="nav navLeft" type="button" onclick="location.href='news.php'">NEWS</button>
		<button class="nav navLeft" type="button" onclick="location.href='photos.php'">PHOTOS</button>
		<button class="nav navLeft" type="button" onclick="location.href='games.php'">GAMES</button>
		<button class="nav navRight" type="button" onclick="location.href='links.php'">LINKS</button>
		<button class="nav navRight" type="button" onclick="location.href='about.php'">ABOUT</button>
		<button class="nav navRight" type="button" onclick="location.href='login.php'">SIGN IN</button>
</div>
<div id='spacer'></div>

<div id='content'>
	Failed to sign in.<br>
	Username and password combination incorrect.
	<form action="login.php" id="form">
		<input class='buttonInput' type="submit" value="TRY AGAIN">
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