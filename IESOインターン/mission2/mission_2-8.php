<?php

$db = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass');
if(!$db){
echo "connect error";
}

$sql="DROP TABLE IF EXISTS t1";
if($db->exec($sql)){
echo "drop table";
}

$db->query('SET NAMES utf8');

$sql="CREATE TABLE IF NOT EXISTS t1("
."ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,"
."name VARCHAR(20) NOT NULL,"
."comment TEXT NOT NULL,"
."passward TEXT NOT NULL,"
."date TEXT NOT NULL"
.");";


if(!$db -> query($sql)){
echo('create error');
}

?>
