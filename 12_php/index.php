<?php

// ①　大元の画面

//0.外部ファイル読み込み
include("functions.php");
// $pdo = db_con();
// return $pdo;



try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}


//２．データ登録SQL作成(gs_an_table)
$stmt = $pdo->prepare("SELECT * FROM box_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    $view .= '<a href=" detail.php?id= '.h($result["id"]).' ">';
    $view .= h($result["id"])."[".h($result["ordername"])."]".h($result["ordername_j"]);
    $view .= '</a>';
    $view .= '　';
    $view .= '<a href="delete.php?id='.h($result["id"]).'">';
    $view .= "[削除]";
    $view .= '</a>';
    $view .= "</p>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/ball.css">
  <!-- <link rel="stylesheet" href="css/index.css"> -->
  <script src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/order.js"></script>

  <title>Document</title>
</head>
<body>


  <div class="area">


  <!--ボール-->
  <div id="transformBox"><img src="img/niwatori.png" class="niwatori"></div>
  <!--入力エリア-->
  <div class="jumbotron">
   <fieldset id="fild">
    <legend class="title" >ニワトリを動かすプログラミング</legend>
    <p class="setumei">①　左にある[　]内の英文の通りに入力します。</p>
    <p class="setumei">②　[動かす]ボタンをクリックすると指示の通り動きだします。</p>
     <label><textArea name="ordername" rows="1" cols="15" 　></textArea></label><br>
     <button type="submit" id="orderbtn">動かす</button>
     <p class="setumei2">※　英語で命令文を送る、プログラミングと英語を結びつけたものです。</p>
    </fieldset>
  </div>

  </div>




<script>
window.onload = function() {




// ＋＋＋＋　scriptの記述　stert　＋＋＋＋　


  // 1 go up 上がる
  function go_up(){
    $('#transformBox').css({
            top: -100,
            left: 0
            }).on('transitionend', function () {
              $(this).css({
                top: 0,
                left: 0
            }).off('transitionend');
          });
  };

  // 2 go down 下がる
  function go_down(){
    $('#transformBox').css({
            top: 100,
            left: 0
            }).on('transitionend', function () {
              $(this).css({
                top: 0,
                left: 0
            }).off('transitionend');
          });
  };
  // 3 Go to the left 左へあるく
  function Go_to_the_left(){
    $('#transformBox').css({
            top: 0,
            left: -200
            }).on('transitionend', function () {
              $(this).css({
                top: 0,
                left: 0
            }).off('transitionend');
          });
  };


  // ＋＋＋＋　scriptの記述　end　＋＋＋＋　




// ajax似て、jsを実行
    $('#orderbtn').click(function () {

      var value = $("textArea[name^='ordername']").val();
      console.log(value);

      $.ajax({
          type:"POST",
          url:"order.php",
          dataType:"text",
          data:{"ordername":value},
          success:function(data){
            console.log(data);
            eval(data+'()');
          },
          error:function(error){
            console.log(error);
          }
      });
    // click　end...
    });




// script end...
};



</script>


<!-- <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a><br>
      <a class="navbar-brand" href="user_itiran.php">ユーザ一覧</a><br>
    </div>
  </nav>
</header> -->
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->



</body>
</html>
