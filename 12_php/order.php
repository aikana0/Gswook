<?php

// ②　割り振られたidを元に、DBよりデータを取得、入力画面へ移動

//1.GETでidを取得
$ordername = $_POST["ordername"];
$view="";

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMesage());
}

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare('SELECT * FROM box_table WHERE ordername=:ordername');
$stmt->bindValue(":ordername", $ordername, PDO::PARAM_STR);
$status = $stmt->execute();


//4.select.phpと同じようにデータを取得（以下はイチ例）
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる

  // $result = $stmt->fetch(PDO::FETCH_ASSOC); //$result["id"];

  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view = $result["order"];
  }
  echo $view;
  // exit();
}


?>
