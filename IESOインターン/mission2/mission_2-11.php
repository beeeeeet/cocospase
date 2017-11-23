<?php

$pdo = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass');

$sql="INSERT INTO t1 (name,comment,date,passward) VALUES(:name,:comment,now(),:pass)";
$stmt=$pdo->query('SET NAMES utf8');
$stmt=$pdo->prepare($sql);
$params1=array(':name'=>'beat',':comment'=>'test1',':pass'=>'aaa');
$params2=array(':name'=>'びーと',':comment'=>'test2',':pass'=>'bbb');

$stmt->execute($params1);
$stmt->execute($params2);


echo "登録完了しました。";


?>