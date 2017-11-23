<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>編集フォーム</title>
</head>

<body>
<p>編集フォーム</p>

<form method="POST" action="keijiban_edit.php">
<br> 編集対象番号：
<input type="text" name="num">
<br>パスワード：
<input type="password" name="pass"><br>
<input type="submit" name="edit" value="編集">
</form>
</body>
</html>

<?php


if(isset($_POST['edit'])){
writeData();
}

function writeData(){
$num=$_POST['num'];
$pass=$_POST['pass'];

$temp1=errorCheck($num);
$temp2=errorCheck($pass);

if($temp1==1){
echo "編集対象番号を入力してください。<br>";
if($temp2==1){
echo "パスワードを入力してください。<br>";
}
}elseif($temp2==1){
echo "パスワードを入力してください。<br>";
}else{

$keijiban_file="keijiban.txt";

if(file_exists($keijiban_file)){
$ichiran=file_get_contents($keijiban_file);

$search=explode("<>",$ichiran);
$count=0;

for($i=0;$i<count($search)-1;$i++){
if($i==0 || $i%5==0){
$count++;
if($search[$i]==$num){
if($search[$i+3]==$pass){
?>

<form method="POST" action="keijiban_edit2.php">
<input type="hidden" name="no" value="<?php echo $i ?>">
<br> 名前　　　：
<input type="text" name="name" value="<?php echo $hyoji[$i+1] ?>"><br>
コメント　：
<textarea name="comment" rows="8" cols="40" value="<?php echo $hyoji[$i+2] ?>"></textarea><br>
<input type="submit" name="edit2" value="編集完了">

<?php
exit;
}else{
echo "パスワードが違います。<br>";
exit;
}
}
}
}
if($num>$count){
echo "見つかりませんでした。<br>";
exit;
}

}else{
echo "掲示板に投稿がありません。<br>";
}

}
}

readData();

function readData(){
$keijiban_file="keijiban.txt";

if(file_exists($keijiban_file)){
$ichiran=file_get_contents($keijiban_file);

$hyoji=explode("<>",$ichiran);
for($i=0;$i<count($hyoji)-1;$i++){
if($i==0 || $i%5==0){
echo "<hr><br> No.".$hyoji[$i]."<br>";
}elseif($i==1 || ($i-1)%5==0){
echo "投稿者：".$hyoji[$i]."<br>";
}elseif($i==2 || ($i-2)%5==0){
echo "コメント: <br>".$hyoji[$i]."<br>";
}elseif($i==4 || ($i-4)%5==0){
echo "投稿日時： ".$hyoji[$i]."<br>";
}
}
}
}

function errorCheck($data){
if(empty($data)){
$temp=1;
}else{
$temp=0;
}
return $temp;
}


?>

