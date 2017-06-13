<?php
//初期値
$filename = 'data/data.txt'; //File名
$ar = array();               //配列格納用

$text = "";

//ファイルからデータ取得
$fp = fopen($filename, 'r'); //Fileを読み込み
while(!feof($fp)) {          //ファイルの最後行までループを繰り返す
  $txt = fgets($fp);         //1行取得

  $exp = explode(",", $txt); //カンマ区切り文字を配列変換
//  $text .= $exp[0]."-"."-"."<br>";
  array_push($ar, $exp);     //$ar配列に$expを追加
}
fclose($fp);

//JSON形式に変換
$json = json_encode($ar);   //$ar配列をjsonに変換
echo $json."<br>";                 //jsonを表示
 var_dump($ar);
//echo "<br>TEXT:<br>".$text;
?>

<script type="text/javascript">
  data = '<?php echo $ar[1][0]." ".$ar[1][1] ?>'


</script>
