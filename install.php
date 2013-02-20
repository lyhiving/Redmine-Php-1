<?php
//	include 'config.php'; 
	
//	if ($CONFIG_SETUP != 'true'){
//	    header( 'Location: install.php') ;
//  }

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
		<style>
		#loginbox input[type="text"], input[type="password"] {
  			width:280px !important;
		}
		</style>
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
			<?php
				switch($_GET['step']){
				default: 
			?>
				<p>Welcome. Before getting started, we need some information on the database. You will need to know the following items before proceeding.</p>
				<ol style="margin-left: 50px;">
					<li>Database name</li>
					<li>Database username</li>
					<li>Database password</li>
					<li>Database host</li>
					<li>Table prefix (if you want to run more than one WordPress in a single database)</li>
				</ol>
				<p><strong>If for any reason this automatic file creation doesn't work, don't worry. All this does is fill in the database information to a configuration file. You may also simply open <code>wp-config-sample.php</code> in a text editor, fill in your information, and save it as <code>wp-config.php</code>.</strong></p>
				<p>In all likelihood, these items were supplied to you by your Web Host. If you do not have this information, then you will need to contact them before you can continue. If you are all ready...</p>
				
				<p class="step"><a href="install.php?step=1" class="button">Lets go!</a></p>
				<style> #box{padding-bottom: 0px;}; </style>
			<?php 
			
			break; 
			
			case '1': 
			
			?>
				
			<form name="MyForm" action="install.php?step=2" method="POST">
				<table>
					<tr>
						<td align="right"><label for="username">Database Host</label></td>
						<td align="left"><input id="host" name="host" tabindex="1" type="text" /></td>
					</tr>
					<tr>
						<td align="right"><label for="username">Database Username</label></td>
						<td align="left"><input id="username" name="username" tabindex="1" type="text" /></td>
					</tr>
					<tr>
						<td align="right"><label for="password">Database Password:</label></td>
						<td align="left"><input id="password" name="password" tabindex="2" type="password" /></td>
					</tr>
					
					<tr>
						<td></td>
						<td align="left">
							
						</td>
					</tr>
					<tr>
						<td align="left">
							
								<a href="/redmine/account/lost_password">Help</a>
							
						</td>
						<td align="right">
							<input type="submit" name="login" value="Next" tabindex="5"/>
						</td>
					</tr>
				</table>
				</div>
				<div id="MyResult" style="height: 0px; position: relative; top: -30px; color: red;"><?php  echo $_GET['error'];  ?></div>
			</form> 
			
			<?php 
			
			break;
			
			case '2':
			
//			Runs the sql install
// 			

			mysql_connect($_POST['host'], $_POST['username'], $_POST['password']) or $error = 1;

//
// 			Builds Config file

			$myFile = "config.php";
			$fh = fopen($myFile, 'w') or die("can't open file");
			$stringData = '<?php' . "\n";
			$stringData .= '$DATABASE_HOST = \'' . $_POST['host'] . '\';' . "\n";
			$stringData .= '$DATABASE_USER = \'' . $_POST['username'] . '\';' . "\n";
			$stringData .= '$DATABASE_PASS = \'' . $_POST['password'] . '\';' . "\n";
//			$stringData .= '$SITE_ADDRESS = \'' .$_SERVER['HTTP_HOST'] + $_SERVER['PHP_SELF'] . '\';' . "\n";
			$stringData .= '$CONFIG_SET = \'true\';' . "\n";
			$stringData .= '?>';
			fwrite($fh, $stringData);
			fclose($fh);

			if ($error < 1){
			?>
			<form name="MyForm" action="install.php?step=3" method="POST">
				<table>
					<tr>
						<td align="right"><label for="username">Admin Username</label></td>
						<td align="left"><input id="username" name="username" tabindex="1" type="text" /></td>
					</tr>
					<tr>
						<td align="right"><label for="password">Admin Password:</label></td>
						<td align="left"><input id="password" name="password" tabindex="2" type="password" /></td>
					</tr>
					
					<tr>
						<td></td>
						<td align="left">
							
						</td>
					</tr>
					<tr>
						<td align="left">
							
								<a href="/redmine/account/lost_password">Help</a>
							
						</td>
						<td align="right">
							<input type="submit" name="login" value="Next" tabindex="5"/>
						</td>
					</tr>
				</table>
				</div>
				<div id="MyResult" style="height: 0px; position: relative; top: -30px; color: red;"><?php  echo $_GET['error'];  ?></div>
			</form> 
			
			
			<?php
			}
			else{
				echo "something went wrong";
			}
			
			break;
			
			case '3':
			
			include 'config.php'; 
			
			include 'dbconnect.php'; 
			
			// 			Creates User	

			$sql = mysql_query("INSERT INTO users (username, password) VALUES ('".$_POST['username']."', '".$_POST['password']."')");
			
			if(!$sql){
				echo "Error with MySQL Query: ".mysql_error();
				$error = 1;
			}

			
			if ($error < 1){
			
				echo 'Everything seems to be working. Lets proceed.<p><input type="button" onclick="window.location = \'login.php\'" value="Next" class="login" /></p>';
			
			}
			
			}
			?>
		</div>
	</body>
</html>