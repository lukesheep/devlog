<?php
session_start();
require "connect.php";
$result= $conn->prepare(
  "SELECT month, year FROM post GROUP BY month, year"
);
  $result->execute();
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
    <div class="container-archive">
      <h1>Archive</h1>
      <?php foreach ($result as $r) { ?>
      <section>
        <button onclick="toggle()"><?php echo $r["month"]." ".$r["year"] ?></button>
        <?php
        $postlist = $conn->prepare(
          "SELECT * FROM post where month=:month AND year=:year ORDER BY id DESC"
        );
        $postlist->bindParam(":month",$r['month']);
        $postlist->bindParam(":year",$r['year']);
        $postlist->execute();
         ?>
        <div id="month-articles">
          <?php foreach ($postlist as $s) {
            $id = $s["id"]?>
          <a href="article.php?id="<?php echo $id ?>><?php echo $s["title"] ?></a> <br>
        <?php } ?>
        </div>
      </section> <?php } ?>

    </div>

  </body>
  <script src="devlog.js"></script>
</html>
