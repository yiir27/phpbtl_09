<?php
//funcs.phpと繋げる
include("../funcs.php");

//----------------------------------------------------
//１．入力チェック(受信確認処理追加)
//----------------------------------------------------
//商品名 受信チェック:item !isset 送信されてなければまたは空の場合はエラー
senderror("item");
//金額 受信チェック:value
senderror("value");
//商品紹介文 受信チェック:description
senderror("description");
//ファイル受信チェック※$_FILES["******"]["name"]の場合
if(!isset($_FILES["fname"]["name"]) || $_FILES["fname"]["name"] == "") {
  exit("ParameError!Files!");
}

//----------------------------------------------------
//２. POSTデータ取得
//----------------------------------------------------
$fname  = $_FILES["fname"]["name"];   //File名
$item  = $_POST["item"];   //商品名
$value  = $_POST["value"];   //価格(数字：intvalを使う)
$description = $_POST["description"];   //商品紹介文

//1-2. FileUpload処理
$upload = "../img/"; //画像アップロードフォルダへのパス
//アップロードした画像を../img/へ移動させる記述↓
if(move_uploaded_file($_FILES['fname']['tmp_name'], $upload.$fname)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['upfile']['error'];
}
//----------------------------------------------------
//３．データ接続、登録SQL作成
//----------------------------------------------------
$pdo = db_conn();
$sql = "INSERT INTO ec_table(id, item, value, description, fname, indate )VALUES(NULL, :item, :value, :description, :fname, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':value', $value, PDO::PARAM_INT); //数値
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$status = $stmt->execute();

//----------------------------------------------------
//５．データ登録処理後
//----------------------------------------------------
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
  //５．item.phpへリダイレクト
  redirect("item.php");
}
?>
