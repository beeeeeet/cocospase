<?php

$pdo = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass');
$dbname="database";
$table="t1";

$sql="SHOW TABLES FROM $dbname";
$result=$pdo ->	query($sql);

if(!$result){
echo "error \n";
}else{
while ($row = mysql_fetch_row($result)) {
    echo "Table: {$row[0]}\n";
}
}


?>
