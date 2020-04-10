<?php
  session_start();
  if(isset($_SESSION["logged"])){

  }else{
    header('Location:index.php ');
  }
  require("../connect.php");
	$result = $conn->query("SELECT * FROM post");
?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="(orientation: landscape)" type="text/css" href='admin.css'>
    <!-- <link rel="stylesheet" media="(orientation: portrait)" href="main_mobile.css"> -->
    <link href = "jquery/jquery-ui.css"  rel = "stylesheet">
   <script src = "jquery/jquery-3.3.1.min.js"></script>
   <script src = "jquery/jquery-ui.min.js"></script>

    <title>DevLog</title>
  </head>
  <body>
    <?php
     if(empty($result)){
       echo("

         <table>
         <tr><td colspan='2'>Article list</td><tr>
         <tr>
         <td>id&nbsp;&nbsp;&nbsp;&nbsp;</td>
         <td>title</td>
         </tr>");
         foreach ($result as $r) {
           echo("
           <tr>
           <td><a class='ajax' href='ajax.php?id=".$r["id"]."'>".$r['id']."</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
           <td>".$r['title']."</td>
           </tr>");
         }
     echo("</table>
         ");

     ?>
     <p id="target"></p>

    <?php	}else{
           echo("no results found");
         }
      ?>
    </body>
  </html>
