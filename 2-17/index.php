<?php
$ct = 0;
$sum = 0;
do {
  $ct++;
  $num = rand(1,6);
  echo ("$ct 回目 = $num<br>");
  $sum += $num;
} while ($sum < 40);
  echo ("合計". $ct ."回でゴールしました <br>");

?>