<?php
	$pdo = new PDO("mysql:host=localhost;dbname=cancermitr", 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	if (!isset($fdir)) {
		$data=json_decode(file_get_contents('php://input'), true);
		$myArr[0]=$data["myArr"];  $tbl=$data["tbl"];  $whr=$data["whr"];
	}
	
	foreach($myArr as $myObj) {
		foreach($myObj as $k=>$x) if (isset($_POST[$k])) $myObj->$k = $_POST[$k];
		$sql = "UPDATE $tbl SET ";
		foreach($myObj as $k => $x) {
			if (is_array($x)) { $ty='';
				foreach($x as $ky => $y) { $ty=$ty.$y.' '; }
				$sql .= (array_key_first((array)$myObj)==$k) ? "$k=\"$ty\" " : ", $k=\"$ty\" " ;
			}
			else $sql .= (array_key_first((array)$myObj)==$k) ? "$k=\"$x\" " : ", $k=\"$x\" " ;
		}
		$sql .= $whr;
	}
	$pdo->exec($sql);
	
	if (!isset($fdir)) $pdo=null;
?>