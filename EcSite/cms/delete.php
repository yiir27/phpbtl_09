<?php
session_start();
include("./funcs.php");

//SESSIONを初期化（空っぽにする）
$_SESSION = array();

//サーバ側での、セッションIDの破棄
session_destroy();

//GETでidを取得
$id = $_GET["id"];

$pdo = db_conn();
$sql = 'DELETE FROM ec_table WHERE id=:id;'
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);    //更新したいidを渡す
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    sql_error($stmt);
  }else{
    redirect("item_kanri.php");
  }
?>