<?php

require_once("db_connect.php");


// POSTで送られていれば処理実行
if (isset($_POST["signUp"])) {
// nameとpassword両方送られてきたら処理実行
    if (isset($_POST["name"]) && isset($_POST["password"])){
        $username = $_POST["name"];
        $password = $_POST["password"];
    

// PDOのインスタンスを取得FILL_IN
    $pdo = db_connect();

try {
    // SQL文の準備 FILL_IN
    $sql = "INSERT INTO users (name,password) VALUES (:name, :password)"; 
    // パスワードをハッシュ化
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    // プリペアドステートメントの作成 FILL_IN
    $stmt = $pdo->prepare($sql); 
    // 値をセット FILL_IN
    $stmt->bindParam(':name',$username);
    $stmt->bindValue(':password',$password_hash);
    // 実行 FILL_IN
    $stmt->execute();
    //登録完了メッセージ出力
    echo '登録が完了しました。';
    } catch (PDOException $e) {
    // エラーメッセージの出力 FILL_IN 
    echo 'データベースエラー' . $e->getMessage();
    // 終了 FILL_IN
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
    <h2>ユーザー登録画面</h2>
    <form method="POST" action="">
        <br>
        <input class="usertext" type="text" name="name" id="name" placeholder="ユーザー名">
        <br>
        <input class="passtext" type="password" name="password" id="password" placeholder="パスワード"><br>
        <input class="botan" type="submit" value="新規登録" id="signUp" name="signUp">
    </form>
</body>
</html>
<style>
    h2 {
        margin: 50px 0 0 70px;
        font-size: 25px;
    }
    .usertext {
        margin: -10px 0 10px 70px;
        width: 270px;
        height: 25px;
    }

    .passtext {
        margin-left: 70px;
        width: 270px;
        height: 25px;
    }

    .botan {
        border-radius: 5%;
        margin: 20px 0 0 70px;
        background-color: #6495ED;
        width: 120px;
        height: 30px;
        color: #ffffff;
        transition: .3s;
        border: #6495ED;
    }
</style>