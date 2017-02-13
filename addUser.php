<!DOCTYPE HTML>

<html>

<head>
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
	
	p{
		font-family: 'nxlight';
		font-size: 28px;
		text-align: center;
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
	
	.card{
		z-index: 0;
		box-shadow: 0 6px 8px 0px rgba(0,0,0,.2);
		
		border-radius: 0px 0px 0px 0px;
		padding: 18px;
		margin: auto;
		margin-top: 18px;
		
		clear: left, right;
		vertical-align: top;
		
		width: 350px;
		max-width: 350px;
		min-width: 350px;
		min-height: 100px;
		max-height: 350px;
		
		background-color: white;
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
</style>

</head>

<body>
<div class="card">
<p>
	Create Account
</p>
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
			
			if(($_COOKIE['password'] == md5($password)) && $row['privilege'] == 'true' ){
				echo "<html>
						<form action='db_addUser.php' method='POST'>
							<input class='field' type='text' name='username' value='username'
								onfocus=\"if(this.value == 'username'){this.value=''}\" onblur=\"if(this.value == ''){this.value='username'}\"><br>
							<input class='field' type='text' name='password' value='password'
								onfocus=\"if(this.value == 'password'){this.value=''}\" onblur=\"if(this.value == ''){this.value='password'}\"><br>
							<input class='field' type='text' name='privilege' value='true'><br>
							<input class='field' type='text' name='color' value='color'
								onfocus=\"if(this.value == 'color'){this.value=''}\" onblur=\"if(this.value == ''){this.value='color'}\"><br>
							<input id='loginbutton' type='submit' value='Create User'>
						</form>
					</html>";
			}
			else{
				echo "<html>
					<form action='db_addUser.php' method='POST'>
						<input class='field' type='text' name='username' value='username'
							onfocus=\"if(this.value == 'username'){this.value=''}\" onblur=\"if(this.value == ''){this.value='username'}\"><br>
						<input class='field' type='text' name='password' value='password'
							onfocus=\"if(this.value == 'password'){this.value=''}\" onblur=\"if(this.value == ''){this.value='password'}\"><br>
						<input class='field' type='text' name='color' value='color'
							onfocus=\"if(this.value == 'color'){this.value=''}\" onblur=\"if(this.value == ''){this.value='color'}\"><br>
						<input id='loginbutton' type='submit' value='Create User'>
					</form>
				</html>";
		}
		}
		else{
			echo "<html>
				<form action='db_addUser.php' method='POST'>
					<input class='field' type='text' name='username' value='username'
						onfocus=\"if(this.value == 'username'){this.value=''}\" onblur=\"if(this.value == ''){this.value='username'}\"><br>
					<input class='field' type='text' name='password' value='password'
						onfocus=\"if(this.value == 'password'){this.value=''}\" onblur=\"if(this.value == ''){this.value='password'}\"><br>
					<input class='field' type='text' name='color' value='color'
						onfocus=\"if(this.value == 'color'){this.value=''}\" onblur=\"if(this.value == ''){this.value='color'}\"><br>
					<input id='loginbutton' type='submit' value='Create User'>
				</form>
			</html>";
		}
	?>
</div>
</body>
</html>