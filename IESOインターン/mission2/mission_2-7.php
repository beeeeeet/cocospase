<?php

try {
$pdo = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass',
array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

?>
