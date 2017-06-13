<?php


$sex = $_POST["sex"];
$age = $_POST["age"];
$area = $_POST["area"];


echo $sex."<br>";
echo $age."<br>";
echo $area."<br>";

$str = date("Y-m-d H:i:s")."文字列";
$file = fopen("data/data.txt","a");	// ファイル読み込み
flock($file, LOCK_EX);			// ファイルロック
fwrite($file, $sex.",".$age.",".$str."\n");
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);



?>
