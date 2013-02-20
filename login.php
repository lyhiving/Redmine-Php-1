<?php

	  if ($_GET['logout'] == 1){
		setcookie("username", "", time()-3600);
		setcookie("log", "", time()-3600);	
  		}


	include 'dbconnect.php'; 
	
	if ($CONFIG_SET != 'true'){
	    header( 'Location: install.php') ;
  }
  

?>
<!DOCTYPE html> 
<html>
	<head>
		<title> Pmine | Login </title>
		<script type='text/javascript' src='js/ajaxsbmt.js'></script> <!-- element tooltips -->
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'></script> 
		<script type='text/javascript'>
			function login(){
				xmlhttpPost('logincheck.php', 'MyForm', 'MyResult', '<div id="blackout"><img id="loading" src="assets/loader.gif"></div>'); return false;
			};
		</script>
		<link type="text/css" href="style.css" rel="stylesheet" />
	</head>
	<body>
		<header>
			<div id="topbar" >
				<div class="left" style="width: 500px;">
					<ul id="mainmenu">
					</ul>
				</div>
				<div class="right" style="width: 50px;">
					Sign In
				</div>
			</div>
			<div id="headerbar">
				<h1> Pmine </h1>
			</div>
		</header>
		<div id="loginbox">
			<form name="MyForm" action="logincheck.php" method="POST">
				<table>
					<tr>
						<td align="right"><label for="username">Login:</label></td>
						<td align="left"><input id="username" name="username" tabindex="1" type="text" /></td>
					</tr>
					<tr>
						<td align="right"><label for="password">Password:</label></td>
						<td align="left"><input id="password" name="password" tabindex="2" type="password" /></td>
					</tr>
					
					<tr>
						<td></td>
						<td align="left">
							
						</td>
					</tr>
					<tr>
						<td align="left">
							
								<a style="font-weight: normal;" href="/redmine/account/lost_password">Lost password</a>
							
						</td>
						<td align="right">
							<input type="submit" name="login" value="Login" tabindex="5"/>
						</td>
					</tr>
				</table>
				</div>
				<div id="MyResult" style="height: 0px; position: relative; top: -30px; color: red;"><?php  echo $_GET['error'];  ?></div>
			</form> 
		</div>
	</body>
</html>