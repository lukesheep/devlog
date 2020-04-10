<?php
require("../connect.php");
session_start();

	$result = $conn->prepare(
    "SELECT * from post where id=:id"
	);
	$result->bindParam(':id',$_GET["id"]);
	$result -> execute();
	$s = $result->fetch();

  echo "&nbsp;&nbsp;&nbsp;&nbsp;";
  echo $s["body"];
  echo "<br><tr>
<td><a href='read.php?id=".$s["id"]."'>View in full</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>";
?>
