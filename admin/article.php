<?php
session_start();
require "../connect.php";
if(isset($_SESSION["logged"])){}else{
	header('Location:/index.php ');
}

if(isset($_POST['id'])) {
	$update = $conn->prepare(
		"UPDATE post set title=:title, body=:body where ID=:id"
	);
  $update_text = trim($_POST['body']);
	$update->bindParam(":id",$_POST['id']);
	$update->bindParam(":body",$update_text);
	$update->bindParam(":title",$_POST['title']);
	$update->execute();
}

if(isset($_GET['id'])) {
	$result = $conn->prepare(
		"SELECT * FROM post where id=:id"
	);
	$result->bindParam(":id",$_GET['id']);
	$result->execute();
  $r = $result->fetch();
}
?>

<?php if(isset($_POST["id"])){?>
	 			Your article was edited.
	 		<?php }?>
	 	<form method="POST" action=<?php echo "article.php?id=".$r["id"] ?>>
	 	<input type=hidden name="id" value=<?php echo $r["id"]?>></input>
	 	Title</br>
	 	<input type=text name="title" value=<?php echo "'".$r["title"]."'"?>></input></br>
	 	Body</br>
	 	<textarea name="body" rows="30" cols="60"> <?php echo $r["body"]?></textarea></br>
	 	<button>update</button></form>
    <a href="list.php">Back to list</a>
