<?php 
session_start();

if (isset($_SESSION["logedIn"])) {
	if ($_SESSION["logedIn"]) {
?>
	<?php echo file_get_contents("./html/page1.php"); ?>
			<title>Startseite</title>
	<?php echo file_get_contents("./html/page2.php"); ?>
						<div class="headerArea">
							<div class="logoArea">
								<img src="./pics/Logo.svg" alt="Logo" class="logo">
							</div>
							<div class="titleArea">
								<h1>Startseite</h1>
							</div>
						</div>
	<?php echo file_get_contents("./html/page3.php"); ?>
						<div class="useCaseArea">
							<div class="useCaseAreaContent">
								<p>Startseiten Inhalt</p>
							</div>
						</div>
	<?php echo file_get_contents("./html/page4.php"); ?>
	<script type="text/javascript">
		document.getElementById("menuAreaElement1").style.color = "#ff0000";
	</script>
<?php
	}
}
?>