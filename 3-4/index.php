<?php
require_once("getData.php");

$x = new getData();
$user_data = $x->getUserData();
$post_data = $x->getPostData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="wrapper">
        <header class="clearfix">
            <div class="header-gazo">
                <img src="1599315827_logo.png">
            </div>
            <div class="header-name">
                <p>ようこそ <?php echo $user_data["last_name"]. $user_data["first_name"]; ?> さん</p>
            </div>

            <div class="header-login">
                <p>最終ログイン：<?php echo $user_data["last_login"]; ?></p>
            </div>
        </header>
        <div class="main">
            <table>
                <tr class="colum">
                    <th>記事ID</th>
                    <th>タイトル</th>
                    <th>カテゴリ</th>
                    <th>本文</th>
                    <th>投稿日</th>
                </tr>
                <?php while ($y = $post_data->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr class="record">
                        <td>
                            <?php echo $y["id"] ?>
                        </td>
                        <td>
                            <?php echo $y["title"] ?>
                        </td>
                        <td>
                            <?php if ($y["category_no"] === "1") : ?> 
                                <?php echo "食事" ?>
                            <?php elseif ($y["category_no"] === "2") : ?> 
                                <?php echo "旅行" ?>
                            <?php else : ?>
                                <?php echo "その他" ?>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php echo $y["comment"] ?>
                        </td>
                        <td>
                            <?php echo $y["created"] ?>
                        </td>
                    </tr>
                <?php endwhile ?>
            </table>
        </div>
        <div class="footer"><a>Y&I group.inc</a></div>    
    </div>
</body>
</html>

