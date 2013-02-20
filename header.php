<?php
	include 'config.php'; 
	
	include 'dbconnect.php';

	if ($_COOKIE["log"] != "loggedin"){
		header( 'Location: login.php');
	}
	
	if (!$title || $title == ""){
		$title = "Pmine";
	}

?>
<!DOCTYPE html> 
<html>
	<head>
		<title> Pmine </title>
		<script type='text/javascript' src='js/ajaxsbmt.js'></script> <!-- element tooltips -->
		<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'></script> 
		<link type="text/css" href="style.css" rel="stylesheet" />
	</head>
	<body>
		<header>
			<div id="topbar" >
				<div class="left" style="width: 500px;">
					<ul id="mainmenu">
						<li><a href="index.php">Home</a></li>
						<li><a href="mypage.php">My Page</a></li>
						<li><a href="projects.php">Projects</a></li>
						<li><a href="admin.php">Administration</a></li>
						<li>Help</li>
					</ul>
				</div>
				<div class="right" style="width: 280px;">
					Logged in as <b style="margin-right: 5px;"><?php echo $_COOKIE["username"] ?></b> <a href="#" style="margin-right: 7px;">My account</a><a href="login.php?logout=1">Sign out</a>
				</div>
			</div>
			<div id="headerbar">
				<h1> <?php echo $title; ?> </h1>
			</div>
		</header>