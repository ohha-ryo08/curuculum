<?php
    //切り上げ
    $x = 3.1;
    echo ceil($x);
    echo '<br>';

    //切り捨て
    $x = 3.1;
    echo floor($x);
    echo '<br>';

    //四捨五入
    $x = 3.1;
    echo round($x);
    echo '<br>';

    //円周率
    echo pi();

    function circleArea($r) {
        $circle_area = $r * $r * pi();
        echo $circle_area;
    }
    //半径１５の円の面積
    circleArea(15);
    echo '<br>';

    //乱数
    echo mt_rand(10,50);
    echo '<br>';

    //文字列の長さ
    $str = "bridge";
    echo strlen($str);
    echo '<br>';

    //検索
    $str = "ohashi";
    echo strpos($str,"s");
    echo '<br>';

    //文字列の切り取り
    $str = "ohashi";
    echo substr($str,-4,3);
    echo '<br>';

    //置換
    $str = "ohashi";
    echo str_replace("ashi","ASHI",$str);
    echo '<br>';
    //スペースなし
    $str = "My name is Ryota";
    echo str_replace(" ","",$str);
    echo '<br>';

    //文字を数える
    $str = "おおはしりょうた";
    echo mb_strlen($str);
    echo '<br>';

    //フォーマット化した文字列を出力
    $name = "佐藤さん";
    $limit_number = 30;

    echo $name."の残り時間はあと".$limit_number."です";
    echo '<br>';
    printf("%sの残り時間はあと%dです", $name, $limit_number);
    echo '<br>';

    $limit_hour = 4000;
    $limit_minute = 30;
    printf("残り%04d時間%02d分",$limit_hour,$limit_minute);
    echo '<br>';

    $limit_hour = 8;
    $limit_minute = 5;
    printf("残り%02d時間%02d分",$limit_hour,$limit_minute);
    echo '<br>';

    //変数の代入できるprintf
    $limit_hour = 8;
    $limit_minute = 5;
    $limit_time = sprintf("残り%02d時間%02d分",$limit_hour,$limit_minute);
    echo $limit_time;
    echo '<br>';
?>