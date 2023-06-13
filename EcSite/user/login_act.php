<?php
session_start();
include("../funcs.php");

//データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM ec_user_table WHERE email=:email AND life_flg=1";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $_POST["email"], PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error();
}

//抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法

if(password_verify($_POST["pw"],$val["pw"])){
    //login成功時
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["life_flg"] = $val['life_flg'];
    $_SESSION["surname"] = $val['surname'];
    $_SESSION["name"] = $val['name'];
    redirect("../index.php");
} else {
    //Login失敗時(Logout経由)
    redirect("login.php");
}
exit();
?>