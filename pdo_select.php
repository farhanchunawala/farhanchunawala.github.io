<?php
	$pdo = new PDO("mysql:host=localhost;dbname=cancermitr", 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$data=json_decode(file_get_contents('php://input'), true); $sql=$data["sql"];
	
	$myArr = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
	echo json_encode($myArr);
	
	$pdo=null;
?>