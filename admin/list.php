<?php
require "../connect.php";
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
