<?php
session_start();
require "connect.php";
$search= $conn->prepare(
  "SELECT * FROM post ORDER BY id DESC LIMIT 4"
);
$search->execute();
$r;
$index = 0;
foreach ($search as $res) {
  $r[$index]["link"] = "'article.php?id=".$res["id"]."'";
  $r[$index]["image"] = $res["image"];
  $r[$index]["category"] = $res["category"];
  $r[$index]["thumb"] = $res["thumb"];
  $r[$index]["title"] = $res["title"];
  $r[$index]["month"] = $res["month"];
  $r[$index]["year"] = $res["year"];
  $index ++;
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
      <a href="category.html">Categories <br> カテゴリー </a>
      <a href="archives.html">Archives <br> 記事月別 </a>
      <a href="about.html">About <br> 自己紹介 </a>
      <a href="contact.html">Contact <br> 連絡</a>
    </nav>
    <div class="container-main">

      <div class="main-article">
        <img src= <?php echo($r[0]["image"]) ?> alt="">
        <?php echo($r[0]["category"]) ?> <br>
        <a href=<?php echo $r[0]["link"]?>><h2><?php echo($r[0]["title"]) ?></h2></a>

      </div>

      <div class="article-list">
        <h2>Recent Stories</h2>
        <a href=<?php echo $r[1]["link"]?>>
        <section class="card">
          <img src=<?php echo($r[1]["thumb"]) ?> alt="">
          <span class="card-text">
            <h3><?php echo($r[1]["category"]) ?></h3>
           <?php echo($r[1]["title"]) ?> <br>
           <h6>Published in <?php echo($r[1]["month"]) ?> <?php echo($r[1]["year"]) ?></h6>
          </span>
        </section></a>
        <a href=<?php echo $r[2]["link"]?>>
        <section class="card">
          <img src=<?php echo($r[2]["thumb"]) ?> alt="">
          <span class="card-text">
            <h3><?php echo($r[2]["title"]) ?></h3>
           <?php echo($r[2]["title"]) ?> <br>
           <h6>Published in <?php echo($r[2]["month"]) ?> <?php echo($r[2]["year"]) ?></h6>
          </span>
        </section></a>
        <a href=<?php echo $r[3]["link"]?>>
        <section class="card">
          <img src=<?php echo($r[3]["thumb"]) ?> alt="">
          <span class="card-text">
             <h3><?php echo($r[3]["title"]) ?></h3>
            <?php echo($r[3]["title"]) ?> <br>
            <h6>Published in <?php echo($r[3]["month"]) ?> <?php echo($r[3]["year"]) ?></h6>
          </span>
        </section></a>

      </div>

    </div>

  </body>
</html>
