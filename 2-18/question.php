<link rel="stylesheet" href="style.css">
<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST['my_name'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$number = ["80","22","20","21"];
$prog = ["PHP","Python","JAVA","HTML"];
$com = ["join","select","insert","update"];
//② ①で作成した、配列から正解の選択肢の変数を作成してください
$answer1 = "80";
$answer2 = "PHP";
$answer3 = "select";
?>
<p>お疲れ様です<?php echo $my_name; ?><!--POST通信で送られてきた名前を出力-->さん</p>
<!--フォームの作成 通信はPOST通信で-->
<form action="answer.php" method="POST">
<h2>①ネットワークのポート番号は何番？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<div class="input2">
<?php 
    foreach($number as $value) { ?>
    <input type="radio" name="number" value="<?php echo $value; ?>">
    <?php echo $value;
}
?>
<h2>②Webページを作成するための言語は？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php
foreach($prog as $value) { ?>
    <input type="radio" name="prog" value="<?php echo $value; ?>">
    <?php echo $value;
}
?>
<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<!--③ 問題のradioボタンを「foreach」を使って作成する-->
<?php
foreach($com as $value) { ?>
    <input type="radio" name="com" value="<?php echo $value; ?>">
    <?php echo $value;
}
?>
</div>
<!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <div class="input3"><input type="submit" value="回答する" /></div>
    <input type="hidden" name="answer1" value="<?php echo $answer1; ?>">
    <input type="hidden" name="answer2" value="<?php echo $answer2; ?>">
    <input type="hidden" name="answer3" value="<?php echo $answer3; ?>">
    <input type="hidden" name="my_name" value="<?php echo $my_name; ?>">
</form>