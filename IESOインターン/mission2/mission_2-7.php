<?php

try {
$pdo = new PDO('mysql:host=localhost;dbname=database;charset=utf8','user','pass',
array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('�f�[�^�x�[�X�ڑ����s�B'.$e->getMessage());
}

?>
