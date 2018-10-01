<?php
session_start();

switch ($_POST['functionname']) {
	case 'useCase1Step2':
		useCase1Step2($_POST['arguments'][0]);
		break;
}
function useCase1Step2($kundennummer) {
	$_SESSION["kundennummer"] = $kundennummer;
	$con = odbc_connect($_SESSION["connection"], $_SESSION["user"], $_SESSION["pass"]);
	//$query = "SELECT kundenid, name, vorname, ort, aenderungsdatum 
	//FROM ovc.OV_KUNDEN_ADRESSAENDERUNGEN ad
	//WHERE ktnr = $kdNr and ANSCHRIFTSART = 1"
	$query = "SELECT kundenid, name, vorname FROM test.table1 WHERE table1.kundenid >= 8195676";
	$result=odbc_exec($con, $query);
?>
	<p>Für welches Konto soll die Auswertung erstellt werden?</p>
	<p>Es wurden folgende Kundenkonten zu dieser Kundennummer gefunden.</p>
	<table>
		<tr>
			<th></th>
			<th>Kunden-Id</th>
			<th>Name</th>
			<th>Vorname</th>
		</tr>
<?php
		$kundenkonten = array();
		$j = 0;
		while(odbc_fetch_row($result)){
			$row = array();
		    for($i=1;$i<=odbc_num_fields($result);$i++){
		    	$res = odbc_result($result,$i);
		        $row[$i-1] = $res;
		    }
		    $kundenkonten[$j] = $row;
		    $j++;
		}
		$_SESSION["kundenkonten"] = $kundenkonten;

		for ($j=0; $j < sizeof($kundenkonten); $j++) {
			echo '<tr>';
				echo '<td><button class="kundenkontoButton" id="kundenkontoButton' . $j . '" onclick="usecase1PrintDoc(\'';
				echo $kundenkonten[$j][0];
				if (sizeof($kundenkonten[$j]) > 0) {
					for ($u=1; $u < sizeof($kundenkonten[$j]); $u++) { 
						echo ";" . $kundenkonten[$j][$u];
					}
				}
				echo '\')">X</button></td>';
				for ($i=0; $i < sizeof($kundenkonten[$j]); $i++) { 
					echo '<td>' . $kundenkonten[$j][$i] . '</td>';
				}
			echo '</tr>';
		}

?>
	</table>
<?php
}
?>