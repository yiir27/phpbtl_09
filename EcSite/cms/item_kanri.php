<?php
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
 //Select*データの数*だけ自動でループしてくれる!!
 while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
  //$resにデータが飛んで＄viewで取り出して文を作って表示したい場所で表示する
  // $view .= $result["id"]."==".$result["item"];
  $view .= '<div class="xl:w-1/4 md:w-1/2 p-4">';
  $view .= '<div class="bg-gray-100 p-6 rounded-lg">';
  $view .= '<img class="h-40 rounded object-contain object-center" src="../img/'.$res["fname"].'" alt="content">';
  $view .= '<h2 class="text-lg text-gray-900 text-center font-medium title-font mb-4">'.$res["item"].'</h2>';
  $view .= '<h2 class="text-lg text-gray-900 text-center font-medium title-font mb-4">'.$res["value"].'</h2>';
  $view .= '<div class="flex justify-center">';
  $view .= '<a herf="delete.php" name="btn-del" class="m-2 text-black bg-slate-300 border-0 py-2 px-8 focus:outline-none hover:bg-slate-400 rounded text-sm m-">削除</a>';
  $view .= '<a herf="update.php" name="btn-update" class="m-2 text-black bg-slate-300 border-0 py-2 px-8 focus:outline-none hover:bg-slate-400 rounded text-sm m-">編集</a>';
  $view .= '</div>';
  $view .= '</div>';
  $view .= '</div>';
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
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
          <span class="text-black text-4xl">商品管理</span>
      </a>
      <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
          <a href="cms/kanri.php" class="mr-5 hover:text-gray-900 text-black"><img src="../images/kanri.png"></a>        
          <a href="../index.php" class="mr-5 hover:text-gray-900 text-black"><img src="../images/home.png"></a> 
          <a href="user/logout.php" class="mr-5 hover:text-gray-900 text-black"><img src="../images/logout.png"></a>     
      </nav>
  </div>
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