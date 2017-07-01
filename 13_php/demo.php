<!--*********************-->
<!--****　PHP　stert　****-->
<!--*********************-->
<?php

//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMesage());
}

// try {
//   $pdo = new PDO('mysql:dbname=aikana_gs_db;charset=utf8;host=	mysql612.db.sakura.ne.jp','aikana','sibaryoutarou0');
// } catch (PDOException $e) {
//   exit('データベースに接続できませんでした。'.$e->getMessage());
// }

//3.SELECT * FROM  WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM box_table WHERE id=:id");
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
<!--**************************************************************-->
<!--****　PHP　end　***********************************************-->





<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/demo.css">
  <link href="https://fonts.googleapis.com/earlyaccess/sawarabigothic.css" rel="stylesheet" />
  <title>POSTデータ登録</title>
  <script src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/demo.js"></script>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <style>div{padding: 10px;font-size:16px;}</style>
</head>

<body>


<!-- Head[Start] -->
<!-- <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
  </nav>
</header> -->
<!-- Head[End] -->



<!-- Main[Start] -->
<div class="link_button_oya">
  <div class='link_button'><?=$result["ordername"]?></div>
</div>
<div class="wrapar">

<!--　英単語エリア　-->

  <div class="textfrom">

        <div class="setumei">「<?=$result["ordername_j"]?>」</div>

        <form method="post" action="update.php">
           <fieldset class="memoarea">
             <textarea name="name" rows="15" cols="45"><?=$result["ordername"]?></textarea>
             <input type="submit" value="送信">
            </fieldset>
        </form>

  </div>

<!--　画像エリア　-->
  <div class="displayzone">
    <div class="display">
        <img src="img/niwatori.png" id="transformBox">
    </div>
  </div>

</div>
<!-- Main[End] -->


<!-- script [Start] -->
<script>
window.onload = function() {
    <?=$result["order"]?>();
// script end...
};

</script>
<!-- script [end...] -->


</body>
</html>
