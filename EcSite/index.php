<?php
session_start();
include("funcs.php");

//1.  DB接続してデータ抽出
$pdo = db_conn();
$sql = "SELECT * FROM ec_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//２．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  sql_error($stmt);
} else {
      //Selectデータの数だけ自動でループしてくれる
      while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<li class="products-item">';
        $view .= '<a href="item.php? id='.$result["id"].' class="like">';
        $view .= '<p class="pruducts-thumb"><img src="./img/'.$result["fname"].'" width="200"></p>';
        $view .= '<h3 class="products-title">'.$result["item"].'</h3>';
        $view .= '<p class="products-price">'.number_format($result["value"]).'</p>';
        $view .= '</a>';
        $view .= '</li>';
      }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
  <header class="text-gray-600 body-font">
    <?php include("menu.php")?>
  </header>
  <div>
    <ul class="bxslider">
      <li><img src="images/index/slide.jpg" alt=""></li>
      <li><img src="images/index/slide.jpg" alt=""></li>
      <li><img src="images/index/slide.jpg" alt=""></li>
      <li><img src="images/index/slide.jpg" alt=""></li>
      <li><img src="images/index/slide.jpg" alt=""></li>
    </ul>
  </div>

  <div class="outer">
    <!--メインカテゴリー-->
    <div class="list-outer">
      <ul class="list">
        <li class="list-item"><a href="#">Category1</a></li>
        <li class="list-item"><a href="#">Category2</a></li>
        <li class="list-item current"><a href="#">Category3</a></li>
        <li class="list-item"><a href="#">Category4</a></li>
        <li class="list-item"><a href="#">Category5</a></li>
      </ul>
    </div>
    <!--end メインカテゴリー-->

    <div class="wrapper wrapper-main flex-parent">

      <aside class="sidebar">
        <!--form-->
        <div class="widget">
          <form action="" method="get" class="search-form">
            <div>
              <input type="text" placeholder="アイテムを探す" class="search-box">
              <input type="submit" value="送信" class="search-submit">
            </div>
          </form>
        </div>
        <!--end form-->

        <!--category-->
        <div class="widget">
          <h3 class="widget-title">All products</h3>
          <ul class="category-list">
            <li class="category-item"><a href="#">Category1</a></li>
            <li class="category-item"><a href="#">Category2</a></li>
            <li class="category-item"><a href="#">Category3</a></li>
            <li class="category-item"><a href="#">Category4</a></li>
            <li class="category-item"><a href="#">Category5</a></li>
          </ul>
        </div>
        <!--end category-->
      </aside>

      <main class="wrapper-main">
        <!--並び替えボタン-->
        <div class="sort-area">
          <a href="#" class="sort-all">全てを見る</a>

          <div class="sort-detail">
            <p class="sort-text">並べ替え:</p>
            <ul class="sort-list flex-parent">
              <li class="sort-item"><a href="#">名前順</a></li>
              <li class="sort-item"><a href="#">価格の安い順</a></li>
            </ul>
          </div>
        </div>
        <!--end 並び替えボタン-->

        <!--商品リスト-->
        <ul class="products-list">
            <?php echo $view; ?>
        </ul>
        <!--end 商品リスト-->

        <!--ページャー-->
        <ul class="pager clearfix">
          <li class="pager-item"><a href="#">1</a></li>
          <li class="pager-item"><a href="#">2</a></li>
          <li class="pager-item"><a href="#">3</a></li>
          <li class="pager-item"><a href="#">4</a></li>
          <li class="pager-item"><a href="#">5</a></li>
          <li class="pager-item"><a href="#">最後へ</a></li>
        </ul>
        <!--end ページャー-->
      </main>
    </div>
  </div>

  <!--footer-->
  <footer class="footer">
    <div class="wrapper wrapper-footer">

      <div class="footer-widget__long">
        <p><a href="#"><img src="images/common/logo.png" alt="g's academy tokyo"></a></p>
      </div>

      <div class="footer-widget">
        <ul class="nav-footer">
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
          <li class="nav-footer__item"><a href="#">Category</a></li>
        </ul>
      </div>

      <div class="footer-widget">
        <ul class="nav-footer">
          <li class="nav-footer__item"><a href="#">G's Academy??</a></li>
          <li class="nav-footer__item"><a href="#">Contact Us</a></li>
          <li class="nav-footer__item"><a href="#">Cart</a></li>
          <li class="nav-footer__item"><a href="#">Member Page</a></li>
        </ul>
      </div>

      <div class="footer-widget">
        <ul class="social-list">
          <li class="social-item"><a href="#"><img src="images/common/facebook.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="images/common/instagram.png" alt=""></a></li>
          <li class="social-item"><a href="#"><img src="images/common/twitter.png" alt=""></a></li>
        </ul>
      </div>

    </div>
    <p class="copyrights"><small>Copyrights G’s Academy Tokyo All Rights Reserved.</small></p>
  </footer>
  <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script>
  $(".bxslider").bxSlider({auto:true,options:3000});
</script>
<script>

$('.<?=$result['id']?>.').on('click',function(){
if(!isset($_SESSION['history'])){
  $_SESSION['history'] = array();
}
if(isset($_GET['id'])){
  $itemID = $_GET['id'];
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<li class="products-item">';
    $view .= '<a href="item.php?id='.$result["id"].'">';
    $view .= '<p class="pruducts-thumb"><img src="./img/'.$result["fname"].'" width="200"></p>';
    $view .= '<h3 class="products-title">'.$result["item"].'</h3>';
    $view .= '<p class="products-price">'.$result["value"].'</p>';
    $view .= '</a>';
    $view .= '</li>';
  }
  $_SESSION['history'][] = $view;
}});
<?php echo $_SESSION['history'];?>

</script>
</body>
</html>
