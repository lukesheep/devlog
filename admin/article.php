<?php
  session_start();
  if(isset($_SESSION["logged"])){

  }else{
    header('Location:index.php ');
  }
  require("../connect.php");
  $result = $conn->prepare(
    "SELECT * from post where id=:id"
	);
	$result->bindParam(':id',$_GET["id"]);
	$result -> execute();
	$r = $result->fetch();
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
    <div class="side">

           <?php echo $r["title"]; ?><br>

    				 <a href="delete.php?id=<?php echo $r['id']; ?> ">DELETE</a> <br>
    				 <a href="update.php?id=<?php echo $r['id']; ?>&subject=<?php echo $r['title']; ?>&body=<?php echo $r['body']; ?>">UPDATE</a>
         </div>
    			 <?php

    			 if(isset($_GET[ 'id'])) {
    			 	if($r["id"]!=null){
    					echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    		 			echo $r["body"];
    					echo "<br><span class='footnote'> By&nbsp;";
    					echo $r["date"];
    					echo "</span><br><br>";
    				}else{
    			 		echo("no results found");
    			 	} }?>
  </body>
</html>
