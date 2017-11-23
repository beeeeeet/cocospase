<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mission2-2</title>
</head>
<body>
<form action="mission_2-2.php" method="post">
  名前：<br />
  <input type="text" name="name" size="30" value="" /><br />
  コメント：<br />
  <textarea name="comment" cols="30" rows="5"></textarea><br />
  <br />
  <input type="submit" value="投稿する" />
</form>

<?php
$file = fopen('kadai_2-2.txt','r');
if($file){
  while ($line = fgets($file)) {
    $count=$line+1;
  }
}else{
$count=1;
}
fclose($file);
$fp=fopen('kadai_2-2.txt','a');
$date = new DateTime();
$str =  $count.'<>' . $_POST['name'] . '<>' . $_POST['comment']
        . '<>' . $date->format('Y-m-d H:i:s') . "<>\n";

fwrite($fp, $str);
fclose($fp);

?>
</body>
</html>