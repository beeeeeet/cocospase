<?php

$pdo = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass');
$db_name="database";

$stmt=$pdo->query('SET NAMES utf8');
$stmt=$pdo->query('SHOW CREATE TABLE t1');


foreach($stmt as $re){
print_r($re);
print "<br>";
}
?>
