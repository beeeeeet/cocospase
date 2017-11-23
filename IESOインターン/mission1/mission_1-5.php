<form action="mission_1-5.php" method="get" accept-charset="euc-jp,us-ascii">
  <input type="text" name="message">
  <input type="submit">
</form>

<?php
$text=$_GET["message"];
$fp=fopen("kadai5.txt","w");
fwrite($fp,$text);
fclose($fp);
?>

