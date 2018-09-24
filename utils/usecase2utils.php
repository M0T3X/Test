<?php
session_start();

if (isset($_SESSION["logedIn"])) {
	if ($_SESSION["logedIn"]) {
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=UseCase2.doc");    
		echo "<html>";
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
		echo "<body>";
		echo "<h1>Betreff: " . $_SESSION['useCase']['parameter1'] . "</h1>";
		echo "<div>";
		$result = $_SESSION['useCase']['result'];
		//var_dump($result);
		
		for ($i=0; $i < sizeof($result); $i++) { 
			for ($j=0; $j < sizeof($result[$i]); $j++) { 
				echo " " . $result[$i][$j] . " ";
			}
			echo "<br>";
		}
		
		if ($_SESSION['useCase']['option1']) {
			echo "<h2>option1</h2>";
		}
		if ($_SESSION['useCase']['option2']) {
			echo "<h2>option2</h2>";
		}
		if ($_SESSION['useCase']['option3']) {
			echo "<h2>option3</h2>";
		}
		echo "</div>";
		echo "</body>";
		echo "</html>";
	}
}
?>