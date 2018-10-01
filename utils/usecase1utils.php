<?php
session_start();

if (isset($_SESSION["logedIn"])) {
	if ($_SESSION["logedIn"]) {
		include_once('../lib/tbs/tbs_class.php');
		include_once('../lib/tbs/plugins/tbs_plugin_opentbs.php');
		$TBS = new clsTinyButStrong;
		$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);

		$row = explode(";", $_GET["row"]);
		$kundennummer = $row[0];
		$name = $row[1];
		$vorname = $row[2];
		$TBS->LoadTemplate('../docs/Kripoanfrage5.docx');
		//$TBS->Plugin(OPENTBS_DEBUG_XML_SHOW, true);
		$TBS->Show(OPENTBS_DOWNLOAD);
	}
}
?>