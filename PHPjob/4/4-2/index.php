<?php
    require_once ('getData.php'); //関数呼び出しより手前に記述する
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4章チェックテスト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="container1">
            <div class="logo">
                <img src = "logo.png" alt = "Y&I group inc ロゴ" width="100%" height="100%">
            </div>
            <div class="container2">
                <div class="user">
                    ようこそ:
                    <?php 
                        $data = new getData();
                        $getuserdata = $data->getUserData();
                        echo $getuserdata["last_name"] ,$getuserdata["first_name"];
                    ?>
                    さん
                </div>
                <div class="loginday">
        
                    最終ログイン日：
                    <?php 
                        echo $getuserdata["last_login"] ;
                    ?>
                </div>
            </div>
        </div>
    </header>
    <main>
        <table>
            <tr>
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>
            <tr>
                <?php 
                    $getpostdata = $data->getPostData();
                    foreach($getpostdata as $val) { ?>
                        <tr>
                        <td> <?php echo $val['id'] ;?></td>
                        <td> <?php echo $val['title'];?></td>
                        <td> <?php 
                                if($val['category_no'] == 1){
                                    echo "食事";
                                }elseif($val['category_no'] == 2){
                                    echo "旅行";
                                }else
                                    echo "その他";
                                ?>
                        </td>
                        <td> <?php echo $val['comment'];?></td>
                        <td> <?php echo $val['created'];?></td>
                        </tr>
                        <?php 
                    }
                ?>
            </tr>
        </table>
    </main>
    <footer>
    Y&I group.inc
    </footer>
</body>
</html>
