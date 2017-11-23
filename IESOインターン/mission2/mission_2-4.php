<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mission2-4</title>
</head>
<body>
<form action="mission_2-4.php" method="post">
  削除番号：<br />
  <input type="text" name="num" size="30" value="" /><br />
  <br />
  <input type="submit" value="削除する" name="remove" />
</form>
</body>
</html>

<?php
if(isset($_POST['remove'])){
$num=$_POST['num'];
if($num){
$retsu=file_get_contents('kadai_2-2.txt');
$show=explode("<>",$retsu);
$j=0;
for($i = 0; $i < count($show); $i++){
if($i == 0 or ($i % 4) == 0){
if($show[$i] == $num){
$i=$i+4;
}
}
$kansei[$j]=$show[$i];
echo "$show[$i] \n";
$j++;
}

$moji=implode("<>", $kansei);
$fp=fopen('kadai_2-2.txt','w+');
fputs($fp, $moji);
fclose($fp);

}else{
echo "番号を入力してください！\n";
}
}

?>


