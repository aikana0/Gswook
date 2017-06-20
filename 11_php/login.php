<?php

// ②　割り振られたidを元に、DBよりデータを取得、入力画面へ移動

//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMesage());
}

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4.select.phpと同じようにデータを取得（以下はイチ例）
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $result = $stmt->fetch(); //$result["id"];
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="loginsyori.php">
  <div class="jumbotron">
    <fieldset>
     <legend>ログイン画面</legend>
      <label>ログインID：<input type="text" name="kanri_flg"></label><br>
      <label>ログインPW：<input type="text" name="life_flg"></label><br>
      <input type="submit" value="ログイン">
     </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
