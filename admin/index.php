<?php
session_start();
require "../connect.php";
if(isset($_SESSION["logged"])){
  header('Location:/devlog/admin/list.php ');
}
?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="(orientation: landscape)" type="text/css" href='admin.css'>
    <!-- <link rel="stylesheet" media="(orientation: portrait)" href="main_mobile.css"> -->
    <title>DevLog</title>
  </head>
  <body>
    <div id = "login" title = "Login">
        <form method="POST" action="check.php" >
    			<label>USER ID:</label><br>
           <input type=text name="userID" required></input><br>
    			 <label>PASSWORD:</label>
           <input type=text name="pass" required></input><br>
           <button>LOGIN</button>
        </form>
      </div>
  </body>
</html>
