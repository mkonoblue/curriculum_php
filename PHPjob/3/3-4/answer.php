<link rel="stylesheet" href="style.css">
<?php
//[question.php]から送られてきた名前の変数、
//選択した回答、問題の答えの変数を作成

$user_name = $_POST['user_name'];
$s_port = $_POST['s_port'];
$s_web = $_POST['s_web'];
$s_sql = $_POST['s_sql'];



//② ①で作成した、配列から正解の選択肢の変数を作成してください
$ans_port = $_POST['ans_port'];
$ans_web = $_POST['ans_web'];
$ans_sql = $_POST['ans_sql'];

// echo $user_name;
// echo $s_port;
// echo $ans_port ;
// echo $s_web ;
// echo $ans_web ;
// echo $s_sql ;
// echo $ans_sql ;



//選択した回答と正解が一致していれば「正解！」、
//一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function fun1($s_port,$ans_port){
    if ($s_port == $ans_port){
        echo "正解！";
    }else{
        echo "残念・・・";
    }
}

function fun2($s_web,$ans_web){
    if ($s_web == $ans_web){
        echo "正解！";
    }else{
        echo "残念・・・";
    }
}

function fun3($s_sql,$ans_sql){
    if ($s_sql == $ans_sql){
        echo "正解！";
    }else{
        echo "残念・・・";
    }
}



?>
<p><!--POST通信で送られてきた名前を表示--><?php echo $user_name;?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php fun1($s_port,$ans_port) ?>

<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php fun2($s_web,$ans_web) ?>

<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php fun3($s_sql,$ans_sql) ?>