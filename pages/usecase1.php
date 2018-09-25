<?php 
session_start();

//unset($_SESSION["step"]);

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


function step0()
{
?>
	<form class="useCaseForm" action="useCase1.php" method="post">
		Kundennummer0: <input type="text" name="kundennummer">
		<input type="submit" name="submit">
	</form>
<?php
	$_SESSION["step"] = 1;
}

function step1()
{
?>
	<form class="useCaseForm" action="useCase1.php" method="post">
		Kundennummer1: <input type="text" name="kundennummer">
		<input type="submit" name="submit">
	</form>
<?php
	$_SESSION["step"] = 2;
}

function step2()
{
?>
	<form class="useCaseForm" action="useCase1.php" method="post">
		Kundennummer2: <input type="text" name="kundennummer">
		<input type="submit" name="submit">
	</form>
<?php
	$_SESSION["step"] = 3;
}

function step3()
{
?>
	<form class="useCaseForm" action="useCase1.php" method="post">
		Kundennummer3: <input type="text" name="kundennummer">
		<input type="submit" name="submit">
	</form>
<?php
	unset($_SESSION["step"]);
}



if (isset($_SESSION["logedIn"])) {
	if ($_SESSION["logedIn"]) {
?>
		<?php echo file_get_contents("../html/page1.php"); ?>
		<title>Usecase1</title>
		<?php echo file_get_contents("../html/page2.php"); ?>
		<div class="headerArea">
			<div class="logoArea"><img src="../pics/Logo.svg" alt="Logo" class="logo"></div>
			<div class="titleArea"><h1>Usecase 1</h1></div>
		</div>
		<?php echo file_get_contents("../html/page3.php"); ?>
		<div class="useCaseArea">
			<div class="useCaseFormArea">


<?php 
				if (!isset($_SESSION['step'])) {
					step0();
				} elseif(isset($_SESSION['step'])) {
					if ($_SESSION['step'] == 1) {
						step1();
					} elseif ($_SESSION['step'] == 2) {
						step2();
					} elseif ($_SESSION['step'] == 3) {
						step3();
					}
				}
?>

<?php
				/*if (isset($_POST["parameter1"])) {
					useCase($_POST["parameter1"], $option1, $option2, $option3);
				}*/
?>






			</div>
		</div>
		<?php echo file_get_contents("../html/page4.php"); ?>
		<script type="text/javascript">
			document.getElementById("menuAreaElement2").style.color = "#ff0000";
		</script>
<?php
	}
}
if (isset($_POST["parameter1"])) {
	echo "<script type='text/javascript'>document.location.href = '../utils/usecase1utils.php'</script>";
}
?>