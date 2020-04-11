<?php
require("../connect.php"); /*Connecting to the database*/
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
<?php
     $result = $conn->query(
       "SELECT * FROM user"
     ); /*Retrieving login information*/
    $false = true;
    /*Checking the user input with database to see if matches.*/
    foreach ($result as $login) {
     if ($_POST["userID"]==$login["username"] && $_POST["pass"]==$login["password"]) {
       session_start();
       $_SESSION["userID"]=$login["userID"];
       $_SESSION["id"]=$login["id"];
       $_SESSION["pass"]=$login["password"];
       $_SESSION["name"]=$login["name"];
       $_SESSION["logged"]="sim";
       header('Location:list.php ');
       $false = false;
    }
    }
    if($false){
     header('Location:index.php');
    }
$conn -> close();
?>
  </body>
</html>
