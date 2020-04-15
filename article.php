<?php
session_start();
require "connect.php";
if(isset($_GET['id'])) {
	$result = $conn->prepare(
		"SELECT * FROM post where id=:id"
	);
	$result->bindParam(":id",$_GET['id']);
	$result->execute();
  $r = $result->fetch();
  $title = $r["title"];
  $body = $r["body"];
  $image = $r["image"];
}
?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="(orientation: landscape)" type="text/css" href='style.css'>
    <!-- <link rel="stylesheet" media="(orientation: portrait)" href="main_mobile.css"> -->
    <title>DevLog</title>
  </head>
  <body>
    <nav>
      <a href="index.php">Sheep <br> DevLog </a>
      <a href="category.php">Categories <br> カテゴリー </a>
      <a href="archives.html">Archives <br> 記事月別 </a>
      <a href="about.html">About <br> 自己紹介 </a>
      <a href="contact.html">Contact <br> 連絡</a>
    </nav>
    <div class="article-container">
      <h1><?php echo $title  ?></h1>
      <img src=<?php echo $image  ?> alt=""> <br>
      <?php echo $body  ?>
    </div>

  </body>
</html>
