<?php
	$pdo = new PDO("mysql:host=localhost;dbname=cancermitr", 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	if (!isset($fdir)) {
		$data=json_decode(file_get_contents('php://input'), true);
		$myArr[0]=$data["myArr"];  $tbl=$data["tbl"];
	}
	
	foreach($myArr as $myObj) {
		foreach($myObj as $k=>$x) if (isset($_POST[$k])) $myObj->$k = $_POST[$k];
		$sql = "INSERT INTO $tbl (";
		foreach($myObj as $k => $x) $sql .= (array_key_first((array)$myObj)==$k) ? $k : ", $k";
		$sql .= ') VALUES (';
		foreach($myObj as $k => $x) $sql .= (array_key_first((array)$myObj)==$k) ? "\"$x\"" : ", \"$x\"";
		$sql .= ')';
	}
	$pdo->exec($sql);
	
	if (!isset($fdir)) $pdo=null;
?>