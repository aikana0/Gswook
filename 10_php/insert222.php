<?php

//　★★　ユーザーから受けとったデータをデータベースに送信する　★★

// 1. POSTデータの取得

if(
  // !isset($_POST["id"]) || $_POST["id"] == "" ||
  !isset($_POST["bookname"]) || $_POST["bookname"]== "" ||
  !isset($_POST["bookURL"]) || $_POST["bookURL"]== "" ||
  !isset($_POST["comment"]) || $_POST["comment"]== ""
){
  exit('ParamError');
}

// $id = $_POST["id"];
$bookname = $_POST["bookname"];
$bookURL = $_POST["bookURL"];
$comment = $_POST["comment"];


// DBに接続します
try{
  $pdo = new
  PDO('mysql:dbname=gs_db;charset=utf8; host=localhost','root','');
} catch (PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// 3.　データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id,bookname,bookURL,comment,day)VALUES (NULL,:bookname,:bookURL,:comment,sysdate())");

$stmt->bindValue(':bookname',$bookname, PDO::PARAM_STR);

$stmt->bindValue(':bookURL',$bookURL, PDO::PARAM_STR);

$stmt->bindValue(':comment',$comment, PDO::PARAM_STR);

$status = $stmt->execute();

// ４　データ登録処理後

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  header("Location: index.php");
}



?>
