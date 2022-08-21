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

<form action="answer.php" method="post">

<input type="text" name="user_name"
    value="<?php echo $user_name; ?>" />
    <?php echo $user_name; ?>


<h2>①HTTPのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->


    <?php foreach($port as $port_value){ ?>
    <input type="radio" name="port"
    value="<?php echo $port_value; ?>" />
    <?php echo $port_value; ?>
    <?php } ?>
    <input type="hidden" name="ans_port" 
    value="<?php echo $ans_port ?>" />
    <?php echo $ans_port ?>



<h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->

    <?php foreach($web as $web_value){ ?>
    <input type="radio" name="v_web" 
    value="<?php echo $web_value; ?>" />
    <?php echo $web_value; ?>
    <?php } ?>
    <input type="hidden" name="ans_web" 
    value="<?php echo $ans_web
 ?>">



<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->

    <?php foreach($sql as $sql_value){ ?>
    <input type="radio" name="v_sql" 
    value="<?php echo $sql_value; ?>" />
    <?php echo $sql_value; ?>
    <?php } ?>
    <input type="hidden" name="ans_sql" 
    value="<?php echo $ans_sql ?>">   


<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
<br>
<input type="submit" value="回答する" />
</form>