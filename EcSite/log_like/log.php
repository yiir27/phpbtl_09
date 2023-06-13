<?php
session_start();
include("../funcs.php");

//２．データ抽出SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM ec_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
 //execute（SQL実行時にエラーがある場合）
 sql_error($stmt);
} else {
    //データの重複をチェックするための配列を初期化
    $item = array();
    //Select*データの数*だけ自動でループしてくれる!!
    while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){       
        //商品名を配列に追加
        $item[] = $res["item"];
        //商品の表示コードを追加
        $view .= '<div class="xl:w-1/4 md:w-1/2 p-4">';
        $view .= '<div class="bg-gray-100 p-6 rounded-lg">';
        $view .= '<img class="h-40 rounded object-contain object-center" src="img/'.$res["fname"].'" alt="content">';
        $view .= '<h2 class="text-lg text-gray-900 text-center font-medium title-font mb-4">'.$res["item"].'</h2>';
        $view .= '<h2 class="text-lg text-gray-900 text-center font-medium title-font mb-4">'.$res["value"].'</h2>';
        $view .= '<div class="flex justify-center">';
        $view .= '<a herf="delete.php" name="btn-del" class="m-2 text-black bg-slate-300 border-0 py-2 px-8 focus:outline-none hover:bg-slate-400 rounded text-sm m-">削除</a>';
        $view .= '</div>';
        $view .= '</div>';
        $view .= '</div>';
        //商品が重複している場合はスキップする
        if(in_array($res["item"],$item)){
            continue;
        }
    }
}
//削除ボタンがクリックされた時の処理
if(isset($_POST['btn-del'])) {
    $delId = $_POST['btn-del'];//削除ボタンの識別式を取得
    //配列内の該当要素を処理
    if(($key = array_search($delId,$item)) !== false){
        unset($item[$key]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="text-gray-600 body-font">
    <?php include("menu.php"); ?>
</header>
<form method="post">
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap  -m-4">
      <?php echo $view; ?>
    </div>
  </div>
</section>
</form>
<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
</body>
</html>