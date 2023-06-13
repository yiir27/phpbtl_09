<?php
include("funcs.php");

//データ取得
$item  = $_POST["item"];   //商品名
$value  = $_POST["value"];   //価格(数字：intvalを使う)
$description = $_POST["description"];   //商品紹介文
$fname  = $_FILES["fname"]["name"];   //File名

//３．データ登録SQL作成
$pdo = db_conn();
$sql = "UPDATE ec_table SET item=:item,value=:value,description=:description,fname=:fname WHERE id=:id"
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':item',   $item,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':value',  $value,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':description', $description, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':fname',   $fname,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt);
  }else{
    redirect("item_kanri.php");
  }  
?>