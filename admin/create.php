<?php
session_start();
require "../connect.php";
if(isset($_SESSION["logged"])){}else{
	header('Location:/index.php ');
}

if(isset($_POST["title"])){
  $insert = $conn->prepare(
  	"INSERT into post(title,image,thumb,body,category,month,year,day,tag,tag2) values(:title,:image,:thumb,:body,:category,:month,:year,:day,:tag,:tag2)"
  );
  $insert->bindParam(':title',$_POST["title"]);
  $insert->bindParam(':image',$_POST["image"]);
  $insert->bindParam(':thumb',$_POST["thumb"]);
  $insert->bindParam(':body',$_POST["body"]);
  $insert->bindParam(':category',$_POST["category"]);
  $insert->bindParam(':month',$_POST["month"]);
  $insert->bindParam(':year',$_POST["year"]);
  $insert->bindParam(':day',$_POST["day"]);
  $insert->bindParam(':tag',$_POST["tag"]);
  $insert->bindParam(':tag2',$_POST["tag2"]);
  $insert->execute();
  $search = $conn->prepare(
    "SELECT * FROM post ORDER BY id DESC LIMIT 1"
  );
  $search->execute();
  $r = $search -> fetch();
  header('Location:/devlog/admin/article.php?id='.$r["id"]);
}
?>


<form method="POST" action="create.php" onsubmit="return confirm('Are you sure you want to do this?');">
Title <br>
<input type="text" name="title" value=""> <br>
Big Image Url <br>
<input type="text" name="image" value=""> <br>
Thumb image url <br>
<input type="text" name="thumb" value=""> <br>
Article <br>
<textarea name="body" rows="30" cols="60"> </textarea> <br>
Category <br>
<input type="text" name="category" value=""> <br>
Date(YEAR/MM/DD) <br>
<input type="text" name="year" value=""> <input type="text" name="month" value=""> <input type="text" name="day" value="">
<br>
Is ready?
<input type="text" name="tag2" value="">
Is public?
<input type="text" name="tag" value="">
<button>publish</button>
</form>
<a href="list.php">Back to list</a>
