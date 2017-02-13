<!DOCTYPE HTML>
<html>
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' href='nav.css'>
<style>
	#content{
		text-align: center;
		height: 100%;
	}
	.dimmer{
		z-index: 0;
		position: fixed;
		top: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,0);
	}
	.darken{
		z-index: 2;
		background-color: black;
	}
	
	#focused{
		display: none;
		position: relative;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		width: 80%;
		height: 80%;
		background-position: center top;
		background-size: contain;
		background-repeat: no-repeat;
		z-index: 4;
	}
	
	.card{
		position: relative;
		z-index: 0;
		width: 24%;
		padding-bottom: 24%;
		margin: 8px;
		
		display: inline-block;
		
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center top;
		
		-webkit-transition: box-shadow .25s, max-width .25s, width .5s, max-height .25s, height .5s, margin .25s;
		transition: box-shadow .25s, max-width .25s, width .5s, max-height .25s, height .5s, margin .25s;
	}
	
	.cardText{
		z-index: 2;
		position: absolute;
		text-align: center;
		background-color: rgba(0,0,0,0);
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		
		-webkit-transition background-color .25s;
		transition: background-color .25s;
	}
	.cardText:hover{
		background-color: rgba(0,0,0,.6);
	}
	.cardText:hover .text{
		opacity: 1;
	}
	
	.cardFocused{
		z-index: 3;
		position: fixed;
		width: 80%;
		height: 80%;
		padding-bottom: 0%;
		
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		background-size: contain;
		background-repeat: no-repeat;
	}
	
	.text{
		font-family: 'nxlight';
		opacity: 0;
		position: absolute;
		top: 50%;
		left: 50%;
		color: white;
		transform: translate(-50%,-50%);
		
		-webkit-transition: opacity .25s;
		transition: opacity .25s;
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

<div class='dimmer'></div>

	<div id='focused'>
		
	</div>


<div id='content'>
	<div class='card' style='background-image:url("pictures/780ti_reference.jpg")'>
		<div class='cardText'>
			<div class='text'>
				Reference GTX 980 Ti
			</div>
		</div>
	</div>
	<div class='card' style='background-image:url("pictures/cloud9.jpg")'>
		<div class='cardText'>
			<div class='text'>
				Cloud9 Logo
			</div>
		</div>
	</div>
	<div class='card' style='background-image:url("pictures/coffee.jpg")'>
		<div class='cardText'>
			<div class='text'>
				Coffee
			</div>
		</div>
	</div>
	<div class='card' style='background-image:url("pictures/tsm.jpg")'>
		<div class='cardText'>
			<div class='text'>
				TSM Logo
			</div>
		</div>
	</div>
	<div class='card' style='background-image:url("pictures/calvin_hobbes2.jpg")'>
		<div class='cardText'>
		<div class='text'>
				Calvin and Hobbes
			</div>
		</div>
	</div>
	<div class='card' style='background-image:url("pictures/earth_moon.jpg")'>
		<div class='cardText'>
		<div class='text'>
				Earth and Moon
			</div>
		</div>
	</div>
	<div class='card' style='background-image:url("pictures/majoras_mask.jpg")'>
		<div class='cardText'>
		<div class='text'>
				Majora's Mask
			</div>
		</div>
	</div>
	<div class='card' style='background-image:url("pictures/planes.jpg")'>
		<div class='cardText'>
		<div class='text'>
				Planes
			</div>
		</div>
	</div>
	<div class='card' style='background-image:url("pictures/nip.jpg")'>
		<div class='cardText'>
		<div class='text'>
				Ninjas in Pyjamas
			</div>
		</div>
	</div>
</div>

</body>
<script>
	$('.cardText').click(function(){
		if($(this).parent().css('position') == 'relative'){
			//$('#loading').fadeIn(0);
			//$(this).parent().addClass('cardFocused');
			$('#focused').css('background-image',$(this).parent().css('background-image'));
			$('#focused').fadeIn(250);
			$('.dimmer').addClass('darken');
			//$('#loading').fadeOut(250);
		}
		else{
			$('#focused').css('display','none');
			//$('#loading').fadeIn(0);
			//$(this).parent().removeClass('cardFocused');
			//$('.dimmer').removeClass('darken');
			//$('#loading').fadeOut(0);
		}
	});
	$('#focused').click(function(){
		$('#focused').fadeOut(250);
		$('.dimmer').removeClass('darken');
	});
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