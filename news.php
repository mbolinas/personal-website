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
		height: 30%;
		max-width: 600px;
		max-height: 400px;
		
		
		border-style: solid;
		border-width: 1px;
		border-color: rgba(200,200,200,.4);
		
		-webkit-transition: border-color .25s, margin-bottom .5s, width .5s, height .5s;
		transition: border-color .25s, margin-bottom .5s, width .5s, height .5s;
	}
	.article:hover{
		border-color: gold;
	}
	.articleExpand{
		margin-bottom: 30px;
		width: 80%;
		height: 60%;
		max-height: 100%;
		max-width: 100%;
	}
	.title{
		text-overflow: ellipsis;
		padding: 10px;
		font-family: 'nxbold';
		color: white;
		border-bottom-style: solid;
		border-bottom-width: 1px;
		border-bottom-color: rgb(200,200,200);
	}
	.text{
		word-wrap: break-word;
		
		text-align: left;
		padding: 10px;
		font-family: 'nxlight';
		color: white;
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
			How to use this website
		</div>
		<div class='text'>
			Click on "Sign in"<br />
			Sign in, or create an account<br />
			Hey look now you can use the chat!<br />
			You can also click on stuff, it's interactive!<br />
			Creating an account with admin privilges requires an admin account to create
		</div>
	</div>
	<div class='article'>
		<div class='title'>
			The "Links" tab
		</div>
		<div class='text'>
			No, the links don't work lol
		</div>
	</div>
	<div class='article'>
		<div class='title'>
			Using Chat
		</div>
		<div class='text'>
			Emotes: LUL  EleGiggle Kappa WutFace SMOrc <br />
			Admin commands: !ban [username]  and  !clear (clears chat)
		</div>
	</div>
</div>

</body>
<script>
	$('.article').click(function(){
		if($(this).css('margin-bottom') == '20px'){
			$(this).addClass('articleExpand');
			
		}
		else{
			$(this).removeClass('articleExpand');
		}
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