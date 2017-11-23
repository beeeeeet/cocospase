<?php
$pdo = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass');

$sql="UPDATE t1 SET name= :name WHERE ID=:ID";
$stmt=$pdo->prepare($sql);
$params=array(':name'=>'ken',':ID'=>'1');

$stmt->execute($params);
echo "更新完了しました\n";
?>