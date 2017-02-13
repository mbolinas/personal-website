<!DOCTYPE HTML>
<html>
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' href='nav.css'>
<style>
	#content{
		text-align: center;
		color: white;
	}
	.title{
		font-family: 'nxbold';
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
		About me
	</div>
	<div class='text'>
		<br>
		I should put stuff in this page <br />
		<br>
		<br>
		<em>
		This website was last updated on 5 / 27 / 2016
		</em>
	</div>
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