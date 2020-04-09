<?php
$conn = null;
try{
	$option = array(
		PDO::ATTR_ERRMODE
		=> PDO::ERRMODE_EXCEPTION);
	$conn = new PDO(
		"mysql:host=localhost;dbname=DevLog;charset=utf8;",
		"lukesheep","cottonlovesdevlog334", $option
	);
}catch(PDOException $e){
	die($e->getMessage());
}

?>
