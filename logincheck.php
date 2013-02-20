<?php

include 'dbconnect.php';


$result = mysql_query("SELECT * FROM users");

while($row = mysql_fetch_array($result)){
	if ($_POST['username'] == $row['username']){
		if ($_POST['password'] == $row['password']){
			setcookie("username", $_POST['username'], time()+3600);
			setcookie("log", "loggedin", time()+3600);
			header( 'Location: index.php' ) ;
		}
		else{
			header( 'Location: login.php?error=incorrect password' ) ;
		}
	}
	else{
		$error = 1;
	}


}
if (error == 1){
	header( 'Location: login.php?error=user not found' ) ;
}
?>