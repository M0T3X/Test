<?php
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
?>