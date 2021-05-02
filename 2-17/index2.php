<?php
$time = intval(date('H'));
if (4 <= $time && $time <= 12) {
    echo "今".$time."時台です<br>"."おはようございます";
} elseif (12 <= $time && $time <= 19) {
    echo "今".$time."時台です<br>"."こんにちは";
} else {
    echo "今".$time."時台です<br>"."こんばんは";
}

?>