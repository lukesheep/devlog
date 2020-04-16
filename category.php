<?php
session_start();
require "connect.php";
if(isset($_GET['cat'])) {
	$result = $conn->prepare(
		"SELECT * FROM post where category=:cat ORDER BY id DESC"
	);
	$result->bindParam(":cat",$_GET['cat']);
	$result->execute();
}else {
  $result= $conn->prepare(
    "SELECT * FROM post ORDER BY id DESC LIMIT 10"
  );
  	$result->execute();
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
      <a href="archives.php">Archives <br> 記事月別 </a>
      <a href="about.html">About <br> 自己紹介 </a>
      <a href="contact.html">Contact <br> 連絡</a>
    </nav>
    <div class="container-category">
      <section class="cat-nav">
        <a href="category.php?cat=game">GAME</a>
        <a href="category.php?cat=web">WEB</a>
        <a href="category.php?cat=other">OTHER</a>
        <a href="category.php?cat=tutorial">TUTORIAL</a>
      </section>
      <section class="cat-list">
        <?php
        if ($result ->rowCount() > 0)
          {
            foreach ($result as $r)
              {
              echo("<a href='article.php?id=".$r["id"]."'>".$r['title']."</a> <br>");
              }

          }else {
            echo("No results.");
          }
         ?>
       </section>
    </div>
  </body>
</html>
