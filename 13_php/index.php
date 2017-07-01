<!--*********************-->
<!--****　PHP　stert　****-->
<!--*********************-->

<?php

//0.　外部ファイル読み込み
include("functions.php");
// $pdo = db_con();
// return $pdo;


try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}


// try {
//   $pdo = new PDO('mysql:dbname=aikana_gs_db;charset=utf8;host=	mysql612.db.sakura.ne.jp','aikana','sibaryoutarou0');
// } catch (PDOException $e) {
//   exit('データベースに接続できませんでした。'.$e->getMessage());
// }


//2．データ登録SQL作成(gs_an_table)
$stmt = $pdo->prepare("SELECT * FROM box_table");
$status = $stmt->execute();


//3．データ表示
$view="";
if($status==false){
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    $view .= '<a class="link_button" href="demo.php?id='.h($result["id"]).'">';
    // $view .= h($result["id"])."　[".h($result["ordername"])."]".h($result["ordername_j"]);
    $view .=  h($result["ordername"]);
    $view .= '</a>';
    $view .= "<div>";
    $view .= "<p class='setumei'>"."「".h($result["ordername_j"])."」"."</p>"."</div>";
    // $view .= '<a href="delete.php?id='.h($result["id"]).'">';
    // // $view .= "[削除]";
    // $view .= '</a>';
    $view .= "</p>";
  }
}
?>
<!--**************************************************************-->
<!--****　PHP　end　***********************************************-->










<!--*********************-->
<!--****　HTML　stert　***-->
<!--*********************-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/ball.css">
  <link href="https://fonts.googleapis.com/earlyaccess/sawarabigothic.css" rel="stylesheet" />

  <!-- <link rel="stylesheet" href="css/index.css"> -->
  <script src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/order.js"></script>

  <title>English++Programing</title>


</head>
<body>

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

  <div class="wrapar">

  <!--　右　-->
      <div class="listright">
        <div class="container jumbotron"><?=$view?></div>
      </div>

  <!--　真ん中 -->
      <div class="displayzone">

        <div class="display">
            <img src="img/niwatori.png" id="transformBox">
        </div>

        <fieldset class="orders">
            <label>
                <textArea name="ordername" rows="1" cols="15" class="orderform">
                </textArea>
            </label>
            <div class="orderbtn_oya">
            <button type="submit" id="orderbtn">Go</button>
            </div>
        </fieldset>

      </div>


  <!--　左　-->
      <div class="listleft">

      </div>

  </div>



<script>
window.onload = function() {

// ＋＋＋＋　scriptの記述　stert　＋＋＋＋　
// 　　　別のファイルにて読み込み　　
  // ＋＋＋＋　scriptの記述　end　＋＋＋＋　




  // $("#test").on("click",function(){
  //   $('#transformBox').css({
  //     transform: 'translate3d(50%,50%,0) rotate(360deg)' // X軸を中心に1回転
  //     // transform: 'rotateY(360deg)' // Y軸を中心に1回転
  //     // transform: 'rotateZ(360deg)' // Z軸を中心に1回転
  //   }).on('transitionend', function () {
  //       $(this).css({
  //       transform: 'translate3d(50%,50%,0)'
  //       }).off('transitionend');
  //   });
  // });


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

</body>
</html>
<!--**************************************************************-->
<!--****　html　end　**********************************************-->
