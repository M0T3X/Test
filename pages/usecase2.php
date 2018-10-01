<?php 
session_start();

if (isset($_SESSION["logedIn"])) {
	if ($_SESSION["logedIn"]) {
?>
		<?php echo file_get_contents("../html/page1.php"); ?>
		<title>Usecase 2</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/functions.js"></script>
		<?php echo file_get_contents("../html/page2.php"); ?>
		<div class="headerArea">
			<div class="logoArea"><img src="../pics/Logo.svg" alt="Logo" class="logo"></div>
			<div class="titleArea"><h1>Usecase 2</h1></div>
		</div>
		<?php echo file_get_contents("../html/page3.php"); ?>
		<div class="useCaseArea">

			<div id="useCase2step1">

			</div>

			<div id="useCase2step2" style="display: none;">
							
			</div>

			<div id="useCase2step3" style="display: none;">
				
			</div>

		</div>
		<?php echo file_get_contents("../html/page4.php"); ?>
<?php
	}
}
?>

<script type="text/javascript">
	$(document).ready(function() {
		activeMenuElementColor("menuAreaElement3");
        useCase2();
    });
</script>