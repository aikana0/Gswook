<?php

//　★★ユーザー側から、データベースにデータを送る ★★

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
$url="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // .　で上書き
    $view .= "<div>";
    $view .= '<div class="id">'.$result["id"]."</div>";
    $view .= '<div class="id">'.$result["bookname"]."</div>";
    $view .=  $result["bookURL"];
    // $view .= '<div class="id">'.$result["bookURL"]."</div>";
    $view .= '<div class="id">'.$result["comment"]."</div>";
    $view .= $result["day"];
    $view .= "</div>";


    // .$result["id"]. "-".$result["name"].</p>
  }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
  <title>bookmarks</title>
</head>
<body>


<!-- Head[Start] -->
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
      <div class="navbar-header"><a href="" class="navbar-header">データ一覧</a></div>
      </div>
    </nav>
  </header>
<!-- Head[End] -->

<!-- Main[Start] -->
  <form action="insert.php" method="post">
    <div class="jumbotron">
      <fieldset>
        <legend>本のブックマーク</legend>
        <label>本の名前：<input type="text" name="bookname" value=""></label><br>
        <label>本のURL：<input type="" name="bookURL"></label><br><label><textArea name="comment" rows="4" cols="40"></textArea></label><br>
        <input type="submit" value="送信">
      </fieldset>
    </div>
  </form>
<!-- Main[End] -->


<div>
    <div class="container jumbotron"><?=$view?></div>
    <a href=<?=$url?>></a>
</div>




</body>
</html>
