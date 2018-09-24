<?php
session_start();
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
function login() {
	$connection = 'DRIVER=MySQL ODBC 8.0 ANSI Driver; SERVER=localhost; DATABASE=test';
	$_SESSION["user"] = $_POST["user"];
	$_SESSION["pass"] = $_POST["pass"];
	$_SESSION["connection"] = $connection;
	$con = odbc_connect($connection, $_POST["user"], $_POST["pass"]);
	if ($con) {
		odbc_close($con);
		$_SESSION["logedIn"] = True;
		header("Location: ./index2.php");
	} else {
		unset($_SESSION["logedIn"]);
		unset($_SESSION["user"]);
		unset($_SESSION["pass"]);
		unset($_SESSION["connection"]);
		echo "Connection failed";
	}
}
if (isset($_POST["user"]) && isset($_POST["pass"])) {
	login();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="/Ermittlung/css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<title>Login</title>
</head>
<body>
	<div class="headerArea">
		<div class="logoArea"><img src="./pics/Logo.svg" alt="Logo" class="logo"></div>
		<div class="titleArea"><h1>Login</h1></div>
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