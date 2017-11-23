<?php
$no=$_POST['no'];
$name=$_POST['name'];
if(empty($name)){$name="名無しさん";}

$comment=$_POST['comment'];
if(empty($comment)){echo "コメントを入力してください。<br>";}
else{
$keijiban_file="keijiban.txt";
if(file_exists($keijiban_file)){

$ichiran=file_get_contents($keijiban_file);
$search=explode("<>",$ichiran);

if($no==0){
$comp=1;
$comp=$comp."<>".$name."<>".$comment;
echo "変更完了しました。<br>投稿者：".$name."<br>コメント：".$comment."<br>";
$temp=3;
}else{
$temp=0;
}

for($i=$temp;$i<count($search)-1;$i++){
if($i==0){
$comp=1;
}elseif($i==$no){
$comp=$comp."<>".$search[$i]."<>".$name."<>".$comment;
echo "変更完了しました。<br>投稿者：".$name."<br>コメント：".$comment."<br>";
$i=$i+2;
}elseif($i%5==0){
$comp=$comp."<>\n".$search[$i];
}else{
$comp=$comp."<>".$search[$i];
}
}
$comp=$comp."<>\n";
$fp=fopen("keijiban.txt",'w+');
fputs($fp,$comp);
fclose($fp);
}else{
echo "掲示板に投稿がありません。<br>";
}

}

?>