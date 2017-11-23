<?php
#①入力フォーム作成
#a.2-1のフォームにパスワード入力を追加
echo "mission2-6\n";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mission2-6</title>
</head>
<body>
<form action="mission_2-6.php" method="post">
  名前：<br />
  <input type="text" name="name" size="30" value="" /><br />
  コメント：<br />
  <textarea name="comment" cols="30" rows="5"></textarea><br />
パスワード：<br />
  <input type="password" name="pass" value="" size="15"><br />
  <br />
<input type="submit" value="登録する" name="add" />
<br />
<br />
<input type="submit" value="削除する"  name="remove"/>
<br />
<br />
  <br />
<input type="submit" value="編集する" name="edu" />
<br />
</form>
</body>
</html>
<?php
#②テキストへ保存
#b.テキスト保存の際にも、パスワードが保存されるように変更する
$file = fopen('mission_2-6.txt','r');
if($file){
  while ($line = fgets($file)) {
    $count=$line+1;
  }
}else{
$count=1;
}
fclose($file);

if($_POST['comment']){
$fp=fopen('mission_2-6.txt','a+');
$date = new DateTime();
$str =  $count.'<>' . $_POST['name'] . '<>' . $_POST['comment']
        . '<>'. $_POST['pass'] . '<>' . $date->format('Y-m-d H:i:s') . "<>\n";
fwrite($fp, $str);

fclose($fp);
}

#③登録するを押したときの操作
if (isset($_POST["add"])) {
echo "登録しました\n";
       $ichiran=file_get_contents('mission_2-6.txt');
       $hyoji=explode("<>",$ichiran);
       for($i = 0; $i < count($ichiran); $i++){
           if(($i%3)==0){
              $i++;
}elseif(($i%4)==0){
echo $hyoji[$i];
echo "\n";
}else{
echo $hyoji[$i];
echo "<>";
}
}
#c.2-4, 2-5の編集削除の際に、パスワードの入力を求める。
#具体的にはパスワード入力ができるようにしたformを表示し、入力させる。

#④削除するを押したときの操作
}elseif (isset($_POST["remove"])) {
?>
<br />
削除対象番号：<br />
  <input type="text" name="numdel" size="30" value="" /><br />
  <br />  
<input type="submit" value="実行"  name="go1"/>
<br/>
<?php
#⑥編集するを押したときの操作
}elseif (isset($_POST["edu"])) {
?>
<br />
編集対象番号：<br />
  <input type="text" name="numhen" size="30" value="" /><br />
<input type="submit" value="実行" name="go2" />
<br />
<?php
}
#⑤削除確認のポップアップ（未完成）
if(isset($_POST["go1"])){
$numdel=$_POST['numdel'];
if($numdel){
$retsu=file_get_contents('mission_2-6.txt');
$show=explode("<>",$retsu);
$k=0;
for($j = 0; $j < count($show); $j++){
if($j == 0 or ($j % 5) == 0){
if($show[$j] == $numdel){
$j=$j+5;
}
}
$kansei[$k]=$show[$j];
$k++;
}

$moji=implode("<>", $kansei);
$fpdel=fopen('mission_2-6.txt','w+');
fwrite($fpdel, $moji);
echo "削除完了\n";
fclose($fpdel);

}else{
echo "番号を入力してください！\n";
}
}
if(isset($_POST["go2"])){
$numhen=$_POST['numhen'];
if($numhen){
$filehen = fopen('mission_2-6.txt','r');
$gyo=file_get_contents('mission_2-6.txt');
$showme=explode("<>",$gyo);
for($l=0; $l<count($showme); $l++){
if($l==0 or $l%5==0){
if($showme[$l]==$numhen){
?>
<form action="mission_2-6.php" method="post">
  <br/>
  名前：<br />
  <input type="text" name="henname" size="30" value="<?= $showme[$l+1] ?>" /><br />
  コメント：<br />
  <textarea name="hencomment" cols="30" rows="5"><?= $showme[$l+2] ?></textarea><br />
  <br />
  <input type="submit" value="編集完了" name="go3"/>
</form>

<?php
$showme[$l+1]=$_POST['henname'];
$showme[$l+2]=$_POST['hencomment'];
$l=$l+3;
}
}
}
}else{
echo "番号を入力してください！\n";
}
}
if(isset($_POST["go3"])){
fclose($filehen);
$mojihen=implode("<>", $showme);
echo $mojihen;
$fphen=fopen('mission_2-6.txt','w+');
fputs($fphen, $mojihen);
echo "編集完了\n";
fclose($fphen);
}
?>

<?php
#d.入力されたパスワードと、書き込み時に保存したパスワードを比較し、一致の場合のみ編集削除が動作するようにする	\n
?>
