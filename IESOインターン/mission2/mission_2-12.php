<?php

$pdo = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass');
$db_name="co_356_it_3919_com";

$stmt=$pdo->query('SET NAMES utf8');

$sql='SELECT * FROM t1';
$result=$pdo->query($sql);

foreach($result as $row){
echo $row['ID'].','
.$row['name']."<br>"
.$row['comment']."<br>"
.$row['date']."<br>"
.$row['pass']."<br>";
}
?>