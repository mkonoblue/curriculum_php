<!-- //新規　本　登録画面 -->

<?php

require_once('db_connect.php');
//セッション開始
session_start();

//$_POSTが空ではない場合
//つまり、ログインボタンが押された場合のみ下記の処理を実行する
if(!empty($_POST)){
    //タイトルが入力されていない場合の処理
    if(empty($_POST["title"])){
        echo "タイトルが未入力です。";
    }
    //本文が入力されていない場合の処理
    if(empty($_POST["date"])){
        echo "発売日が未入力です。";
    }
    //本文が入力されていない場合の処理
    if(empty($_POST["stock"])){
        echo "在庫が未入力です。";
    }
}

//両方共入力されている場合
if(!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["stock"] )){
    //タイトルと発売日と在庫数のエスケープ処理
    $title = htmlspecialchars($_POST["title"], ENT_QUOTES);
    $date = htmlspecialchars($_POST["date"], ENT_QUOTES);
    $stock = htmlspecialchars($_POST["stock"], ENT_QUOTES);
    //ログイン処理開始
    $pdo = db_connect();
    try {
        //データベースに登録
        $sql = "INSERT INTO books(title,date,stock) VALUES ('$title','$date','$stock')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        // main.phpにリダイレクト
        header("Location: main.php");
        exit;
    } catch (PDOException $e) {
        echo "Error:".$e->getMessage();
        die();
    }

}


?>


<!doctype html>
<html lang="jp">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- orgnal CSS -->
    <link href="style.css" rel="stylesheet">
    <title>本　登録画面</title>
</head>

<body>
    <div class='container m-5'>
        <div class="small_disp mx-auto">
            <div class="row">
                    <h1>本　登録画面</h1>
                    <form method="post" action="">
                    <input type="text" class="form-control mt-3" id="title" name="title" placeholder="タイトル">
                    <input type="text" class="form-control mt-3" id="date" name="date" placeholder="発売日" onfocus="this.type='date'" onfocusout="this.type='text'" >
                    <label for="stock" class="form-label mt-3">在庫数</label>
                    <select class="form-select " name="stock">
                        <option value="" disabled selected style="display:none;">選択してください</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                    </select>
                    <div class=" col-5 ">
                        <button type="submit" class="btn btn-primary mt-3 w-100">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>