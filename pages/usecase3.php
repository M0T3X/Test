<?php 
session_start();

if (isset($_POST["parameter1"])) {
	$option1 = False;
	$option2 = False;
	$option3 = False;
	if (isset($_POST["option1"])) {
		$option1 = True;
	}
	if (isset($_POST["option2"])) {
		$option2 = True;
	}
	if (isset($_POST["option3"])) {
		$option3 = True;
	}
	$_SESSION['useCase'] = array('result' => '',
		'parameter1' => $_POST["parameter1"], 
		'option1' => $option1,
		'option2' => $option2, 
		'option3' => $option3);
}

function useCase($parameter1, $option1, $option2, $option3) {
	echo "<div>" . $parameter1 . $option1 . $option2 . $option3 . "<br><br></div>";
	$con = odbc_connect($_SESSION["connection"], $_SESSION["user"], $_SESSION["pass"]);
	$sql = "SELECT * FROM table1 WHERE table1.row1 >= 2";
	$result=odbc_exec($con, $sql);
	echo "<div>";
	$odbc_result_array = array();
	$j = 0;
	while(odbc_fetch_row($result)){
		$row = array();
	    for($i=1;$i<=odbc_num_fields($result);$i++){
	        echo "Result is ".odbc_result($result,$i);
	        $row[$i-1] = "" . odbc_result($result,$i);
	    }
	    $odbc_result_array[$j] = $row;
	    $j++;
	    echo "<br>";
	}
	$_SESSION['useCase']['result'] = $odbc_result_array;
	echo "</div>";
}

if (isset($_SESSION["logedIn"])) {
	if ($_SESSION["logedIn"]) {
?>
		<?php echo file_get_contents("../html/page1.php"); ?>
		<title>Usecase3</title>
		<?php echo file_get_contents("../html/page2.php"); ?>
		<div class="headerArea">
			<div class="logoArea"><img src="../pics/Logo.svg" alt="Logo" class="logo"></div>
			<div class="titleArea"><h1>Usecase 3</h1></div>
		</div>
		<?php echo file_get_contents("../html/page3.php"); ?>
		<div class="useCaseArea">
			<div class="useCaseFormArea">
				<form class="useCaseForm" action="useCase3.php" method="post">
					Parameter 1 <input type="text" name="parameter1">
					<input type="checkbox" name="option1"> Option 1
					<input type="checkbox" name="option2"> Option 2
					<input type="checkbox" name="option3"> Option 3
					<input type="submit" name="submit">
				</form>
<?php
				if (isset($_POST["parameter1"])) {
					useCase($_POST["parameter1"], $option1, $option2, $option3);
				}
?>
			</div>
		</div>
		<?php echo file_get_contents("../html/page4.php");
	}
}
if (isset($_POST["parameter1"])) {
	echo "<script type='text/javascript'>document.location.href = '../utils/usecase3utils.php'</script>";
}
?>