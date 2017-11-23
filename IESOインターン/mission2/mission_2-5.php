<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mission2-5</title>
</head>
<body>
<form action="mission_2-5.php" method="post">
  編集対象番号：<br />
  <input type="text" name="num" size="30" value="" /><br />
  <br />
  <input type="submit" value="編集する" />
</form>
</body>
</html>

<?php
$num=$_POST['num'];
if($num){
$file = fopen('kadai_2-2.txt','r');
$retsu=file_get_contents('kadai_2-2.txt');
$show=explode("<>",$retsu);
for($i=0; $i<count($show); $i++){
if($i==0 or $i%4==0){
if($show[$i]==$num){
?>
<form action="mission_2-5.php" method="post">
投稿番号：<br />
  <input type="text"  name="num" size="30" value="<?= $show[$i] ?>" /><br />
  <table>
  名前：<br />
  <input type="text" name="name1" size="30" value="<?= $show[$i+1] ?>" /><br />
  コメント：<br />
  <textarea name="comment1" cols="30" rows="5"><?= $show[$i+2] ?></textarea><br />
  <br />
  <input type="submit" value="編集完了" />
</form>

<?php
$show[$i+1]=$_POST['name1'];
$show[$i+2]=$_POST['comment1'];
$i=$i+3;
}
}
}
fclose($file);
$moji=implode("<>", $show);
$fp=fopen('kadai_2-2.txt','w+');
fputs($fp, $moji);
fclose($fp);
}


?>
