<!-- //ログイン画面 -->
<?php

require_once('db_connect.php');
//セッション開始
session_start();

//$_POSTが空ではない場合
//つまり、ログインボタンが押された場合のみ下記の処理を実行する
if (!empty($_POST)) {
    //ログイン名が入力されていない場合の処理
    if (empty($_POST["name"])) {
        $test_alert = "<script type='text/javascript'>alert('名前が未入力です。');</script>";
        echo $test_alert;
        //echo "名前が未入力です。";
    }
    //パスワードが入力されていない場合の処理
    if (empty($_POST["password"])) {
        $test_alert = "<script type='text/javascript'>alert('パスワードが未入力です。');</script>";
        echo $test_alert;
        //echo "パスワードが未入力です。";
    }
}
//両方共入力されている場合
if (!empty($_POST["name"]) && !empty($_POST["password"])) {
    //ログイン名とパスワードのエスケープ処理
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES);
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES);
    //ログイン処理開始
    $pdo = db_connect();
    try {
        //データベースアクセスの処理文章。ログイン名があるか判定
        $sql = "SELECT * FROM users WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
        die();
    }
    //結果が1行取得できたら
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //ハッシュ化されたパスワードを判定する定型関数のpassword_verify
        //入力された値と引っ張ってきた値が同じか判定しています。
          if (password_verify($password,$row["password"])){
        // if ($password == $row["password"]) {
            //セッションに値を保存
               $_SESSION["user_id"] = $row["id"];
               $_SESSION["user_name"] = $row["name"];
            //main.phpにリダイレクト
            header("Location:main.php");
            exit;
        } else {
            //パスワードが違っていた時の処理
            $test_alert = "<script type='text/javascript'>alert('パスワードに誤りがあります。');</script>";
            echo $test_alert;
            //echo "パスワードに誤りがあります。";
        }
    } else {
        //ログイン名がなかった時の処理
        $test_alert = "<script type='text/javascript'>alert('ユーザー名かパスワードに誤りがあります。');</script>";
        echo $test_alert;
        //echo "ユーザー名かパスワードに誤りがあります。";
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
    <title>ログイン</title>
</head>

<body>
    <div class='container m-5'>
        <div class="small_disp mx-auto">
            <div class="row">
                <div class="title col-7">
                    <h1>ログイン画面</h1>
                </div>
                <div class="btn col-5">
                    <button onclick="location.href='newuser.php'" type="botton" class="btn btn-success">新規ユーザー登録</button>
                </div>
                <form method="post" action="">
                    <input type="text" class="form-control mt-3" name="name" id="name" placeholder="ユーザー名">
                    <input type="test" class="form-control mt-3" name="password" id="password" placeholder="パスワード">
                    <div class=" col-5 ">
                        <input type="submit" class="btn btn-primary mt-3 w-100" value="ログイン">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>