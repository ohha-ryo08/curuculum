<?php

function getArea($length, $wide, $height) {
    $area = $length * $wide * $height;
    print "直方体の体積は".$area."です";

}
getArea(5,10,8);
?>