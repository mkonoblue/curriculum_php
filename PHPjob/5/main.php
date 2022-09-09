<!-- //在庫一覧画面 -->

<?php
//DB接続の読み込み
require_once('db_connect.php');
// function.phpの読み込み
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

//PDOのインスタンスを取得
$pdo = db_connect();

try {
    $sql = "SELECT * FROM books ORDER BY date ;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
    die();
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
    <title>在庫一覧</title>
</head>

<body>
    <div class='container m-5 mx-auto'>

        <div class="title">
            <h1>在庫一覧画面</h1>
        </div>
        <div class="row">
            <div class="col-2">
                <button onclick="location.href='newbook.php'" type="submit" class="btn btn-primary w-100">新規登録</button>
            </div>
            <div class="col-2">
                <button onclick="location.href='login.php'" type="submit" class="btn btn-secondary w-100">ログアウト</button>
            </div>
        </div>
        <table class="table table-bordered  mt-3 align-middle text-center">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">タイトル</th>
                    <th scope="col">発売日</th>
                    <th scope="col">在庫数</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                    <tr>
                        <th><?php echo $row['title']; ?></th>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['stock']; ?></td>
                        <td><button type="button" onclick="location.href='delete_post.php?id=<?php echo $row["id"]; ?>'" class="btn btn-danger">削除</botton>
                        </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>

    </div>

</body>

</html>