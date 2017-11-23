<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>掲示板</title>
</head>

<body>
<p>掲示板</p>

<form method="POST" action="keijiban.php">
<br> 名前　　　：
<input type="text" name="name"><br>
コメント　：
<textarea name="comment" rows="8" cols="40"></textarea><br>
パスワード：
<input type="password" name="pass"><br>
<input type="submit" name="add" value="投稿">
<input type="submit" name="remove" value="削除">
<input type="submit" name="edit" value="編集">
</form>
</body>
</html>

<?php


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
}else{
echo "皆さんからのご投稿お待ちしてます。<br>";
}
}



if(isset($_POST['add'])){
writeData();
}

function writeData(){
$name=htmlspecialchars($_POST['name']);
$comment=htmlspecialchars($_POST['comment']);
$pass=$_POST['pass'];

if(empty($name)){$name="名無しさん";}

$temp1=errorCheck($comment);
$temp2=errorCheck($pass);

if($temp1==1){
echo "コメントを入力してください。<br>";
if($temp2==1){
echo "パスワードを入力してください。<br>";
}
}elseif($temp2==1){
echo "パスワードを入力してください。<br>";
}else{
$file=fopen("keijiban.txt",'a+');

while($line=fgets($file)){
$count=$line+1;
}
if($count==0){
$count=1;
}

$date= new DateTime();
$str= $count.'<>'.$name.'<>'.$comment.'<>'.$pass.'<>'.$date->format('Y-m-d H:i:s')."<>\n";
fwrite($file,$str);
echo "<hr>\r\n No.".$count."<br>";
echo "投稿者：".$name."<br>";
echo "コメント: <br>".$comment."<br>";
echo "投稿日時： ".$date->format('Y-m-d H:i:s')."<br>";
fclose($file); 
}

}

if(isset($_POST['remove'])){
header("location:keijiban_remove.php");
}

if(isset($_POST['edit'])){
header("location:keijiban_edit.php");
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
