<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>掲示板</title>
</head>

<body>
<p>掲示板</p>

<form method="POST" action="regist.php">
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

<?php
$db = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass');
if(!$db){
echo "connect error<br>";
exit;
}

$result = mysql_query('SET NAMES utf8', $db);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}

$result = mysql_query('SELECT * FROM messages ORDER BY no DESC', $db);
while ($data = mysql_fetch_array($result)) {
echo "<hr>NO.".$data['ID']
."<br> name:".$data['name']
."<br>comment:".$data['comment']
."<br>pass:".$data['pass']
."<br>date:".$data['date']."<br>";
}
$db = mysql_close($db);

?>
</body>
</html>