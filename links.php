<!DOCTYPE HTML>
<html>
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' href='nav.css'>
<style>
	#content{
		height: 100%;
		text-align: center;
	}
	.article{
		margin: auto;
		margin-top: 20px;
		margin-bottom: 20px;
		display: block;
		width: 40%;
		max-width: 600px;
		text-align: center;
		
		-webkit-transition: border-color .25s, margin-bottom .5s, width .5s, height .5s;
		transition: border-color .25s, margin-bottom .5s, width .5s, height .5s;
	}
	.title{
		font-size: 22px;
		text-overflow: ellipsis;
		padding: 20px;
		font-family: 'nxbold';
		color: white;
		border-bottom-style: solid;
		border-bottom-width: 1px;
		border-bottom-color: rgb(200,200,200);
	}
	.text{
		text-align: center;
		padding: 10px;
		font-family: 'nxlight';
		color: white;
	}
	a{
		width: 30%;
		padding: 10px;
		display: block;
		margin: auto;
		margin-top: 20px;
		margin-bottom: 20px;
		border-style: solid;
		border-width: 1px;
		border-color: rgb(200,200,200);
		text-decoration: none;
		font-family: 'nxbold';
		font-size: 18px;
		color: white;
		
		-webkit-transition: border-color .25s;
		transition: border-color .25s;
	}
	a:visited{
		color: rgb(160,160,160);
		border-color: rgb(160,160,160);
	}
	a:hover{
		border-color: gold;
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

<div id='content'>
	<div class='article'>
		<div class='title'>
			Links to Other Stuff
		</div>
		<div class='text'>
			<br>
			<br>
			<a href=''>OLD WEBSITE</a>
			<a href=''>PROXY</a>
		</div>
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