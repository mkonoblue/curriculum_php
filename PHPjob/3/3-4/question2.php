<link rel="stylesheet" href="style.css">
<?php
//POST送信で送られてきた名前を受け取って変数を作成
$user_name = $_POST['name'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$port = [80,22,20,21];
$web = ["PHP","Python","JAVA","HTML"];
$sql = ["join","select","insert","update"];
//② ①で作成した、配列から正解の選択肢の変数を作成してください
$ans_port = $port[0];
$ans_web = $web[3];
$ans_sql = $sql[1];


?>
<p>お疲れ様です<!--POST通信で送られてきた名前を出力--><?php echo $user_name; ?>さん</p>
<!--フォームの作成 通信はPOST通信で-->
<h2>①HTTPのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->

<form action = "answer2.php" method = "post" >
    <?php foreach($port as $port_value){ ?>
    <input type="radio" name="port"
    value="<?php echo $port_value; ?>" />
    <?php echo $port_value; ?>
    <?php } ?>
    <input type="hidden" name="ans_port" 
    value="<?php echo $ans_port ?>" />
</form>



<h2>①HTTPのポート番号は何番？</h2>
<form method="POST" action="answer2.php">
   <input type="radio" name="port" value="<?php echo $port[0]; ?>" /> <?php echo $port[0]; ?><br>
   <input type="radio" name="port" value="<?php echo $port[1]; ?>" /> <?php echo $port[1]; ?><br>
   <input type="radio" name="port" value="<?php echo $port[2]; ?>" /> <?php echo $port[2]; ?><br>
   <input type="radio" name="port" value="<?php echo $port[3]; ?>" /> <?php echo $port[3]; ?><br>
   <input type="hidden" name="ans_port" value="<?php echo $ans_port ?>">
   <input type="submit" value="回答する">
   <?php echo $ans_port; ?>
</form>

</body>
</html>
<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
<form action="answer.php" method="post">
<input type="submit" value="回答する" />