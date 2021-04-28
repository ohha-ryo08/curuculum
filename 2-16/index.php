<?php

// ファイルの書き込み
$testFile = "test.txt";
$contents = "こんにちは！";

if (is_writable($testFile)) {
    $fp = fopen($testFile, "w");

    fwrite($fp,$contents);

    fclose($fp);

    echo "finish writing!!";
} else {
    echo "not writable!";
    exit;
}

//ファイルの読み込み
$test_file = "test2.txt";

if (is_readable($test_file)) {

    $fp = fopen($test_file,"r");

    while ($line = fgets($fp)) {

        echo $line.'<br>';
    }
    fclose($fp);
} else {
    echo "not readable!";
    exit;
}
?>
