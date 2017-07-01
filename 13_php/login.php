
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<!-- <link rel="stylesheet" href="css/main.css" /> -->
<link rel="stylesheet" href="css/login.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>




<div class="title">
<header>
  <nav class="title_name">にわとりをプログラミングしよう！</nav>
</header>
</div>

<div class="login">
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
ID:<input class='form' type="text" name="lid" />
PW:<input class='form' type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>

</div>



</body>
</html>
