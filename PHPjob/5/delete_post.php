<?php

//DB接続の読み込み
require_once('db_connect.php');
// function.phpの読み込み
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// URLの?以降で渡されるIDをキャッチ
$id = $_GET['id'];

//もしidが空だったらmain.phpにリダイレクト
//不正なアクセス対策
redirect_main_unless_parameter($id);


//PDOのインスタンスを取得
$pdo = db_connect();
    try {
        //SQL文の準備
        $sql = 'DELETE FROM books WHERE id = :id';
        //プリペアドステートメントの作成
        $stmt = $pdo->prepare($sql);
        //idのバインド
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        // main.phpにリダイレクト
        header("Location: main.php");
        exit;
    } catch (PDOException $e) {
        echo "Error:".$e->getMessage();
        die();
    }
