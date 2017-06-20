<?php

// ②　割り振られたidを元に、DBよりデータを取得、入力画面へ移動

//1.GETでidを取得
$kanri_flg = $_GET["kanri_flg"];
$life_flg = $_GET["life_flg"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMesage());
}

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE kanri_flg=:kanri_flg AND life_flg=:life_flg");
$stmt->bindValue(":kanri_flg", $id, PDO::PARAM_INT);
$stmt->bindValue(":life_flg", $id, PDO::PARAM_INT);
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
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name" value="<?=$result["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$result["email"]?>"></label><br>
     <label>
     <textArea name="naiyou" rows="4" cols="40">
     <?=$result["naiyou"]?>
     </textArea></label><br>
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
