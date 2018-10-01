<?php
session_start();

include("./php/functions.php");

if (isset($_SESSION["logedIn"])) {
	unset($_SESSION["logedIn"]);
}
if (isset($_SESSION["user"])) {
	unset($_SESSION["user"]);
}
if (isset($_SESSION["pass"])) {
	unset($_SESSION["pass"]);
}
if (isset($_SESSION["connection"])) {
	unset($_SESSION["connection"]);
}
if (isset($_POST["user"]) && isset($_POST["pass"])) {
	login();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="/Ermittlung/pics/pageTabIcon.ico">
		<link href="/Ermittlung/css/style.css" rel="stylesheet" type="text/css" media="screen" />
		<title>ODBC Login</title>
	</head>
	<body>
		<div class="headerArea">
			<div class="logoArea"><img src="./pics/Logo.svg" alt="Logo" class="logo"></div>
			<div class="titleArea"><h1>ODBC Login</h1></div>
		</div>
		<div class="loginArea">
			<div class="loginFormArea">
				<form class="loginForm" action="index.php" method="post">
					<input type="text" name="user" placeholder="ODBC Benutzer" value="root">
					<input type="password" name="pass" placeholder="ODBC Passwort">
					<input type="submit" name="submit">
				</form>
			</div>
		</div>
	</body>
</html>