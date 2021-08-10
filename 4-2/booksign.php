<?php

// db_connect.phpの読み込み
require_once('db_connect.php');
// function.phpの読み込み
require_once("function.php");
// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// 提出ボタンが押された場合
if (!empty($_POST)) {
    // titleとdate、stockの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])) {
        echo '発売日が未入力です。';
    } elseif (empty($_POST["stock"])){
        echo '在庫数が未入力です。';
    }

    if (isset($_POST["title"]) && isset($_POST["date"]) && isset($_POST["stock"])) {
    
        $title = $_POST["title"];
        $date = $_POST["date"];
        $stock = $_POST["stock"];

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備
            $sql = "INSERT INTO books (title,date,stock) VALUES (:title,:date,:stock)";
            // プリペアドステートメントの準備
            $stmt = $pdo->prepare($sql);
            // タイトルをバインド
            $stmt->bindParam(':title',$title);
            //発売日をバインド
            $stmt->bindParam(':date',$date);
            //在庫数をバインド
            $stmt->bindParam(':stock',$stock);
            // 実行
            $stmt->execute();
            // main.phpにリダイレクト
            header("Location: main.php");
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo '在庫登録できませんでした。' . $e->getMessage();
            // 終了
            die();
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h2>本登録画面</h2>
    <form method="POST" action="">
        <br>
        <input class="titletext" type="text" name="title" id="title" placeholder="タイトル">
        <br>
        <input class="datetext" type="text" name="date" id="date" placeholder="発売日"><br>
        <p>在庫数</p>
        <br>
        <select class="stocktext" name="stock">
        <option value="" selected>選択してください</option>
            <?php for ($i=1;$i<=100;$i++){ ?>
                <option value="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <input class="botan" type="submit" value="登録" id="post" name="post">
    </form>
</body>
</html>
<style>
    h2 {
        margin: 50px 0 0 70px;
        font-size: 25px;
    }
    p {
        margin: 10px 0 -10px 70px;
        font-size: 20px;
    }
    .titletext {
        margin: -10px 0 10px 70px;
        width: 270px;
        height: 25px;
    }

    .datetext {
        margin-left: 70px;
        width: 270px;
        height: 25px;
    }

    .stocktext {
        margin-left: 70px;
        width: 250px;
        height: 25px;
    }

    .botan {
        border-radius: 5%;
        margin: 10px 0 0 70px;
        background-color: #6495ED;
        width: 120px;
        height: 30px;
        color: #ffffff;
        transition: .3s;
        border: #6495ED;
    }
</style>