<?php
session_start();
require "../connect.php";
if(isset($_SESSION["logged"])){}else{
	header('Location:/index.php ');
}

if(isset($_POST['id'])) {
	$delete= $conn->prepare(
		"DELETE FROM post where ID=:id"
	);
	$delete->bindParam(":id",$_POST['id']);
	$delete->execute();
}

$_SESSION["deleted"] = "yes";
header('Location:/devlog/admin/list.php ');
 ?>
