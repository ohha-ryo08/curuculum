<?php
//要素の数を数える
$members = ["ohashi","taoka","baba","sato","okada"];
echo count($members);
echo '<br>';

//要素の並び替え
//アルファベット
$members = ["ohashi","taoka","baba","sato","okada"];
sort($members);
var_dump($members);
echo '<br>';
//数字
$numbers = [43, 100, 2, 32, 76];
sort($numbers);
var_dump($numbers);
echo '<br';

//配列の中にある要素
$members = ["ohashi","taoka","baba","sato","okada"];
if (in_array("ohashi",$members)) {
    echo "大橋がいるよ！"; 
} else {
    echo "大橋はいないよ！";
}
echo '<br>';

//配列を結合して文字列に変換
$members = ["ohashi","taoka","baba","sato","okada"];
$atstr = implode("@",$members);
var_dump($atstr);
echo '<br>';

//文字列を指定の区切りで配列にする
$members = ["ohashi","taoka","baba","sato","okada"];
$atstr = implode(",", $members);
var_dump($atstr);

$re_members = explode(",", $atstr);
var_dump($re_members);

?>