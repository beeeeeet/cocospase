<?php
$db = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass');
if(!$db){
echo "connect error";
}
$sql="DROP TABLE IF EXISTS messages";
if($db->exec($sql)){
echo "drop table";
}
?>
