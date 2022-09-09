<!-- //ユーザー登録画面 -->

<?php

// db_connect.phpの読み込みFILL_IN
require_once("db_connect.php");

// POSTで送られていれば処理実行
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST["newuser"])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // nameとpassword両方送られてきたら処理実行
    if ($name!= "" && $password != "") {
        try {
        // PDOのインスタンスを取得FILL_IN
            //PDOインスタンスの作成
            $pdo = db_connect();
        
            // SQL文の準備 FILL_IN 
            $touroku_sql = "INSERT INTO users (name,password) VALUES (:name,:password);";
            // パスワードをハッシュ化
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            // プリペアドステートメントの作成 FILL_IN 
            $stmt = $pdo->prepare($touroku_sql);
            // 値をセット　FILL_IN
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':password', $password_hash);
            // 実行 FILL_IN
            $stmt->execute();
            //　登録完了メッセージ出力
            echo "登録完了しました";
        // エラーメッセージの出力 FILL_IN 
        }catch(PDOException $e){
            echo "データベースエラー"; 
            //echo $e->getMessage();
            // 終了 FILL_IN
            die();
        }
    } else {
        echo "ユーザ名・パスワードを入力してください";
}
} else {
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
    <title>ユーザー登録画面</title>
</head>

<body>
    <div class='container m-5'>
        <div class="small_disp mx-auto">
            <div class="row">
                    <h1>ユーザー登録画面</h1>
                <form method="post" action="">
                    <input type="text" class="form-control mt-3" id="name" name="name" placeholder="ユーザー名">
                    <input type="password" class="form-control mt-3" id="password" name="password" placeholder="パスワード">
                    <div class=" col-5 ">
                        <button type="submit" name="newuser" class="btn btn-primary mt-3 w-100">新規登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>