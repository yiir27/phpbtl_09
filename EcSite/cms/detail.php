<?php
session_start();
$id = $_GET["id"];
include("funcs.php");
sschk();

//データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM ec_table WHERE id=:id"
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    sql_error($stmt);
}else{
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ更新</title>
</head>
<body>
<div class="outer">
<!--商品本情報-->
    <div class="wrapper wrapper-cms">
    <!--商品選択フォーム-->
    <form action="update.php" method="post" class="flex-parent cartin-area cms-area" enctype="multipart/form-data">
        <!--商品情報-->
        <p class="cms-thumb"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>
        <dl class="cms-list">
        <dt>画像</dt>
        <dd><input type="file" name="fname" class="cms-item" accept="<?=$row["fname"]?>"></dd>
        <dt>商品名</dt>
        <dd><input type="text" name="item" placeholder="商品名を入力" class="cms-item" value="<?=$row["item"]?>"></dd>
        <dt>金額</dt>
        <dd><input type="text" name="value" placeholder="金額を入力" class="cms-item" value="<?=$row["value"]?>"></dd>
        <dt>商品紹介文</dt>
        <dd><textarea name="description" id="" cols="30" rows="10" class="cms-item">value="<?=$row["description"]?>"</textarea></dd>
        </dl>
        <!--end 商品情報-->
        <ul class="btn-list btn-list__cms">
        <li class="">
            <a href="item_kanri.php" class="btn-back">戻る</a>
        </li>
        <li class="btn-calculate">
            <input type="submit" id="btn-update" value="登録">
        </li>
        </ul>
        </form>
        <!--end 商品選択フォーム-->
    </div>
<!--end 商品本情報-->
</div>
</body>
</html>