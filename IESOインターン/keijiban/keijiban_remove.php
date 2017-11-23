<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>削除フォーム</title>
</head>

<body>
<p>削除フォーム</p>

<form method="POST" action="keijiban_remove.php">
<br> 削除対象番号：
<input type="text" name="num">
<br>パスワード：
<input type="password" name="pass"><br>
<input type="submit" name="remove" value="削除">
</form>
</body>
</html>

<?php


if(isset($_POST['remove'])){
writeData();
}

function writeData(){
$num=$_POST['num'];
$pass=$_POST['pass'];

$temp1=errorCheck($num);
$temp2=errorCheck($pass);

if($temp1==1){
echo "削除対象番号を入力してください。<br>";
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

if($num==1){
if($search[3]==$pass){
echo "削除完了しました<br>";
$ff=6;
}else{
echo "パスワードが違います。<br>";
exit;
}
}else{
$ff=1;
}

$comp=1;
$count=2;

for($i=$ff;$i<count($search)-1;$i++){
if($i%5==0){
if($search[$i]==$num){
if($search[$i+3]==$pass){
echo "削除完了しました<br>";
$i=$i+4;
}else{
echo "パスワードが違います。<br>";
exit;
}
}else{
$comp=$comp."<>\n".$count;
$count++;
}
}else{
$comp=$comp."<>".$search[$i];
}
}
$comp=$comp."<>\n";
if($num>$count){
echo "見つかりませんでした。<br>";
exit;
}


$fp=fopen("keijiban.txt",'w+');
fputs($fp,$comp);
fclose($fp);

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
