<?php
session_start();
require "../connect.php";
if(isset($_SESSION["logged"])){}else{
	header('Location:/devlog/admin/index.php ');
}

if(isset($_SESSION["deleted"]) and $_SESSION["deleted"] == "yes"){
  $_SESSION["deleted"] = "no";
  echo "the article was deleted";

}
$sql = "SELECT * from post";
$result = $conn -> query($sql);
if ($result ->rowCount() > 0)
  {
    echo("<table>
             <tr><td colspan='2'>Article list</td></tr>
             <tr><td>id&nbsp;&nbsp;&nbsp;&nbsp;</td><td>title</td></tr>");
    foreach ($result as $r)
      {
      echo("
      <tr><td><a href='article.php?id=".$r["id"]."'> ".$r['id']."</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
               <td>".$r['title']."</td>
               </tr>");
      }

  }else {
    echo("No results.");
  }
 ?>
 <br>
<a href="create.php"> New post</a>
