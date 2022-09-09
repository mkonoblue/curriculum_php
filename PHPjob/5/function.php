<?php
//function.php

/**
 * $_SESSION["user_name"]が空だった場合、ログインページにリダイレクトする
 * @return void
 */
function check_user_logged_in(){
    //セッション開始
    session_start();
    //セッションにuser_nameの値がなければlogin.phpにリダイレクト
    if (empty($_SESSION["user_name"])){
        header("Location:login.php");
        exit;    
    }
}

/**
 *  もし、$idが空であったらmain.phpにリダイレクト
 * @param integer $param
 * @return void
 **/
function redirect_main_unless_parameter($param){
    if (empty($param)) {
        header("Location: main.php");
        exit;
    }
}


/**
 * 引数で与えられたidでpostsテーブルを検索する
 * もし対象のレコードがなければmain.phpに遷移させる
 * @param integer $id
 * @return array
 */

 function find_post_by_id($id){
    //PDOのインスタンスを取得
    $pdo = db_connect();
    try {
        //SQL文の準備
        $sql = "SELECT * FROM posts WHERE id = :id";
        //プリペアドステートメントの作成
        $stmt = $pdo->prepare($sql);
        //idのバインド
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error:".$e->getMessage();
    die();
    }

    //結果が1行取得できたら
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $row;
    }else{
        redirect_main_unless_parameter($row);
    }
}