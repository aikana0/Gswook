<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>questionnaire</title>
</head>
<body>



  <form action="output1_data.php" method="post">
    <p>性別：女性<input type="radio" name="sex" value="女性" size="20">
    男性<input type="radio" name="sex" size="20"value="男性"></p>
    <p>年齢：10〜20代<input type="radio" name="age" size="20" value="10〜20代">30代<input type="radio" name="age" size="20" value="30代">40代<input type="radio" name="age" size="20" value="40代">50代<input type="radio" name="age" size="20" value="50代">
60代<input type="radio" name="age" size="20" value="50代"></p>
    <!--選べる用にしたい　住まいのエリアAPI-->
    <p>住まいのエリア：<input type="text" name="area" size="20"></p>
    <p>プログラミングをご存知ですか？：
      触れた事はないが存在は知っている<input type="radio" name="age" size="20" value="30代">
      偶に使用する<input type="radio" name="age" size="20" value="40代">
      仕事としている<input type="radio" name="age" size="20" value="50代">
      知らない<input type="radio" name="age" size="20" value="50代"></p>

    <p>プログラミング教育について興味はありますか？：ある<input type="radio" name="age" size="20" value="ある">少し興味がある<input type="radio" name="age" size="20" value="少し興味がある">ない<input type="radio" name="age" size="20" value="ない"></p>


    <p>以下のプログラミング教室を知っていますか？（複数回答可能）：<input type="text" name="name" size="20"></p>
    <p>何歳くらいからプログラミングを習わせたいと思いますか？：<input type="text" name="name" size="20"></p>



    <input type="submit" value="送信">
  </form>




</body>
</html>
