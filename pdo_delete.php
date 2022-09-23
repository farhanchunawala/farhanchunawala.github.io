<?php
	$pdo = new PDO("mysql:host=localhost;dbname=cancermitr", 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	if (!isset($fdir)) {
		$data=json_decode(file_get_contents('php://input'), true);
		$tbl=$data["tbl"];  $whr=$data["whr"];
	}
	
	$sql = "DELETE FROM $tbl $whr";
	$pdo->exec($sql);
	
	if (!isset($fdir)) $pdo=null;
?>