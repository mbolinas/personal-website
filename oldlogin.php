<!DOCTYPE HTML>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<style>
	@font-face{
		font-family: nxlight;
		src: url(nxlight.otf);
	}
	@font-face{
		font-family: nxbold;
		src: url(nxbold.otf);
	}
	body{
		background-color: rgb(135,206,250);
	}
	#showHeader{
		position: fixed;
		left: 24px;
		top: 24px;

		
		height: 48px;
		width: 100%;
	}
	#showHeaderButton{
		z-index: 11;
		float: left;
		clear: left;
		
		border-radius: 48px;
		border-style: none;
		box-shadow: 0 6px 6px 0px rgba(0,0,0,.2);
		
		background-color: rgb(255,255,255);
		height: 48px;
		width: 48px;
		
		-webkit-transition: box-shadow .25s;
		transition: box-shadow .25s;
	}
	#showHeaderButton:hover{
		box-shadow: 0 8px 6px 0px rgba(0,0,0,.4);
	}
	#navbar{
		display: none;
		opacity: 0;
		
		float: left;
		
		//position: fixed;
		
		//width: 80%;
		//left: 0;
		//top: 0;
		z-index: 0;
		margin-top: -3px;
		background-color: rgb(190,190,190);
		box-shadow: 0 6px 8px 0px rgba(0,0,0,.4);
		
		-webkit-transition: opacity .25s;
		transition: opacity .25s;

	}
	.nav{
		z-index: 10;
		display: block;
		
		font-family: 'nxlight';
		font-size: 18px;
		background-color: white;
		margin: auto;
		border: 0px solid;
		border-color: white;
		
		-webkit-transition: background-color .25s, border-color .25s, box-shadow .25s;;
		transition: background-color .25s, border-color .25s, box-shadow .25s;;
		
		box-shadow: 0 0px 0px 0px rgba(0,0,0,0);
		
		height: 48px;
		width: 220px;
		min-width: 100px;
		max-width: 220px;
	}
	.nav:hover{
		border-color: rgb(100,150,255);
		background-color: rgb(100,150,255);
	}
	.nav:active{
		box-shadow: 0 6px 8px 0px rgba(0,0,0,.2);
	}
	
	
	
	#holder{
		
	}
	p{
		font-family: 'nxlight';
		font-size: 28px;
		text-align: center;
		
	}
	.card{
		z-index: 0;
		box-shadow: 0 6px 8px 0px rgba(0,0,0,.2);
		
		border-radius: 0px 0px 0px 0px;
		padding: 18px;
		margin: auto;
		margin-top: 18px;
		
		clear: left, right;
		vertical-align: top;
		
		width: 100%;
		max-width: 350px;
		min-width: 100px;
		min-height: 100px;
		max-height: 350px;
		
		background-color: white;
	}
	#form{
		width: 100%;
		padding: 0px;
	}
	#signup{
		margin: 0px;
		float: center;
		padding: 18px;
		width: 100%;
		height: 100px;
		
	}
	.field{
		margin: 0px;
		width: 346px;
		
		text-align: center;
		color: rgb(80,80,80);
		
		margin-top: 8px;
		margin-bottom: 8px;
		
		font-family: 'nxlight';
		font-size 14px;
		height: 24px;
		
		border-style: none;
		border-bottom-style: solid;
		border-bottom-width: 2px;
		border-bottom-color: rgb(150,150,150);
		
		//box-shadow: 0 6px 4px 0px rgba(0,0,0,.2);
		
		-webkit-transition: background-color .25s, width .25s, height .25s, border-bottom-color .25s;
		transition: background-color .25s, width .25s, height .25s, border-bottom-color .25s;
	}
	.field:focus{
		background-color: rgb(255,255,255);
		border-bottom-color: rgb(100,150,255);
		height: 24px;
		outline: none;
	}
	.field:hover{
		background-color: rgb(255,255,255);
		border-bottom-color: rgb(100,150,255);
		height: 24px;
		outline: none;
	}
	#loginbutton{
		font-family: 'nxlight';
		margin: 0px;
		margin-top: 16px;
		width: 348px;
		height: 36px;
		font-size: 14px;
		
		background-color: rgb(190,190,190);
		border: 1px solid;
		border-color: darkgrey;
		
		-webkit-transition: background-color .25s, border-color .25s, box-shadow .1s;;
		transition: background-color .25s, border-color .25s, box-shadow .1s;;
		
		box-shadow: 0 0px 0px 0px rgba(0,0,0,0);
	}
	#loginbutton:hover{
		border-color: rgb(100,150,255);
		background-color: rgb(100,150,255);
		box-shadow: 0 3px 2px 0px rgba(0,0,0,.2);
		outline: none;
	}
	#loginbutton:focus{
		border-color: rgb(100,150,255);
		background-color: rgb(100,150,255);
		box-shadow: 0 3px 2px 0px rgba(0,0,0,.2);
		outline: none;
	}
	
	#signup{
		font-family: 'nxlight';
		margin: 0px;
		margin-top: 8px;
		width: 348px;
		//height: 36px;
		font-size: 14px;
		
		background-color: rgb(190,190,190);
		border: 1px solid;
		border-color: darkgrey;
		
		-webkit-transition: background-color .25s, border-color .25s, box-shadow .1s;;
		transition: background-color .25s, border-color .25s, box-shadow .1s;;
		
		box-shadow: 0 0px 0px 0px rgba(0,0,0,0);
	}
	#signup:hover{
		border-color: rgb(100,150,255);
		background-color: rgb(100,150,255);
		box-shadow: 0 3px 2px 0px rgba(0,0,0,.2);
		outline: none;
	}
	#signup:focus{
		border-color: rgb(100,150,255);
		background-color: rgb(100,150,255);
		box-shadow: 0 3px 2px 0px rgba(0,0,0,.2);
		outline: none;
	}
	
</style>
</head>

<body>

<div id='showHeader'>
<button type='button' id='showHeaderButton'></button>
	<div id="navbar">

		<button class="nav" type="button" onclick="location.href='main.php'">HOME</button>

		<button class="nav" type="button" onclick="location.href='photos.php'">PHOTOS</button>

		<button class="nav" type="button" onclick="location.href='games.php'">GAMES</button>
		
		<button class="nav" type="button" onclick="location.href='links.php'">LINKS</button>
		
		<button class="nav" type="button" onclick="location.href='about.php'">ABOUT</button>
		
		<button class="nav" type="button" onclick="location.href='login.php'">SIGN IN</button>
	</div>
	<script id="INCLUDE ME">
		$("#showHeaderButton").click(function() {		
			if($('#navbar').css('display') == 'none'){
				$("#navbar").css('display','inline-block');
				$("#navbar").animate({opacity: 1},48,"linear");
			}
			else{
				$("#navbar").animate({opacity: 0},48,"linear");
				$("#navbar").hide();
			}
		});
	</script>
</div>

<div id="cspacer">
</div>


<div id="holder">
	<div class="card" id="login">
		<p>
			sign into your account
		</p>
		<form action="db_tryLogin.php" method="POST">
			<input class="field" type="text" name="username" value="username" onfocus="if(this.value == 'username'){this.value=''}" onblur="if(this.value == ''){this.value='username'}"><br>
			<input class="field" type="text" name="password" value="password" onfocus="if(this.value == 'password'){this.value=''}" onblur="if(this.value == ''){this.value='password'}"><br>
			<input id="loginbutton" type="submit" value="Login">
		</form>
	</div>
	<div id="cspacer">
		<p>
			- or -
		</p>
	</div>
	<div class="card">
		<p>
			create an account
		</p>
	<form action="addUser.php" id="form">
		<input type="submit" id="signup" value="Create Account">
	</form>
	</div>
</div>
</body>

</html>