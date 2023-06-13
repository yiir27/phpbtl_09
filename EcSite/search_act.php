<?php
include("funcs.php");

$search_word = $_POST["search_word"] ?? '';
//DB接続
$pdo = db_conn();
$sql = "SELECT * FROM ec_table WHERE item LIKE :search_word";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':search_word', "%{$search_word}%", PDO::PARAM_STR);
$status = $stmt->execute();

//３.データ表示
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("データが見つかりませんでした" . $error[2]);
}

$values = $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values, JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品検索</title>   
</head>
<body>
    <?php foreach ($values as $data) {?>
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap  -m-4">
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="h-40 rounded object-contain object-center" src="img/<?=$data["fname"]?>" width="200"alt="content">
                        <h2 class="text-lg text-gray-900 text-center font-medium title-font mb-4"><?=$data["item"]?></h2>
                        <h2 class="text-lg text-gray-900 text-center font-medium title-font mb-4"><?=$data["value"]?></h2>
                        <div class="flex justify-center">
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</body>
</html>