<link rel="stylesheet" href="style.css">
<?php 
//[question.php]から送られてきた名前の変数、
//選択した回答、問題の答えの変数を作成

$user_name = $_POST['user_name'];
$s_port = $_POST['ans_port'];
$v_web = $_POST['v_web'];
$v_sql = $_POST['v_sql'];

echo $user_name;
echo $port;
echo $ans_port ;


//② ①で作成した、配列から正解の選択肢の変数を作成してください
$ans_port = $port[0];
$ans_web = $web[3];
$ans_sql = $sql[1];




//選択した回答と正解が一致していれば「正解！」、
//一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function fun1($v_port,$ans_port){
    if ($v_port == $ans_port){
        echo "正解！";
    }else{
        echo "不正解・・・";
    }
}

function fun2($v_web,$ans_web){
    if ($v_web == $ans_web){
        echo "正解！";
    }else{
        echo "不正解・・・";
    }
}

function fun3($v_sql,$ans_sql){
    if ($v_sql == $ans_sql){
        echo "正解！";
    }else{
        echo "不正解・・・";
    }
}



?>
<p><!--POST通信で送られてきた名前を表示-->さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php fun1() ?>

<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php fun2() ?>

<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php fun3() ?>