<?php

// db_connect.phpの読み込み
require_once("db_connect.php");

// function.phpの読み込み
require_once("function.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "SELECT * FROM books";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql); 
    // 実行
    $stmt->execute();
} catch (PDOException $e) {
    // エラーメッセージの出力
    echo 'Error: ' . $e->getMessage();
    // 終了
    die();
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>メイン</title>
</head>
<body>
    <h2>在庫一覧画面</h2>
    <button class="toroku" type="button" onclick="location.href='booksign.php'">新規登録</button>
    <button class="out" type="button" onclick="location.href='logout.php'">ログアウト</button><br />

        <table>
        <tr class="mainmain">
            <td>タイトル</td>
            <td>発売日</td>
            <td>在庫数</td>
            <td></td>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr class="zaiko">
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><button class="botan" type="button" onclick="location.href='delete_book.php?id=<?php echo $row['id'];?>'">削除</button></td>
            </tr>
        <?php } ?>
        </table>
</body>
</html>
<style>
    h2 {
        margin: 50px 0 0 30px;
        font-size: 25px;
    }

    .toroku {
        margin: 10px 0 0 30px;
        border-radius: 5%;
        background-color: #6495ED;
        width: 90px;
        height: 30px;
        color: #ffffff;
        transition: .3s;
        border: #6495ED;
    }
    
    .out {
        margin-left: 10px;
        border-radius: 5%;
        background-color: #999999;
        width: 100px;
        height: 30px;
        color: #ffffff;
        transition: .3s;
        border: #6495ED;
    }

    table {
        margin: 10px 0 0 20px;
        border-collapse: collapse;
        width: 550px;
        table-layout: fixed;
    }

    td {
        border: 1px solid #bbb;
    }

    .mainmain {
        height: 50px;
        text-align: center;
        background-color: #EEEEEE;
    }

    .zaiko {
        height: 60px;
        text-align: center;
    }

    .botan {
        border-radius: 5%;
        background-color: #FF3333;
        width: 60px;
        height: 30px;
        color: #ffffff;
        transition: .3s;
        border: #6495ED;
    }
</style>