<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mission2-3</title>
</head>
<body>
<form action="mission_2-3.php" method="post" />
  名前：<br />
  <input type="text" name="name" size="30" value="" /><br />
  コメント：<br />
  <textarea name="comment" cols="30" rows="5"></textarea><br />
  <br />
  <input type="submit" value="登録する" name="add"/>
</form>
</body>
</html>

<?php
$file = fopen('kadai_2-2.txt','a+');
$counter=file('kadai_2-2.txt');
if($_POST['comment']){
if($counter[0]==0){
$count=1;
}else{
 while ($line = fgets($file)) {
   $count=$line+1;
}
}
$date = new DateTime();
$str =  $count.'<>' . $_POST['name'] . '<>' . $_POST['comment']
        . '<>' . $date->format('Y-m-d H:i:s') . "<>\n";

fwrite($file, $str);

if(isset($_POST["add"])){
$retsu=file_get_contents('kadai_2-2.txt');
$show=explode("<>",$retsu);
$i=0;
for($i=0;$i<count($show);$i++){
echo $show[$i]."\r\n";
}
}

fclose($file);
}
?>


