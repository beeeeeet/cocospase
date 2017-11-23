<?php
$pdo = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass');

$sql='DELETE FROM t1 WHERE ID=:ID';
$stmt=$pdo->prepare($sql);
$params=array(':ID'=>2);
$stmt->execute($params);
echo "削除完了しました\n";
?>