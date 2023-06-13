<?php
session_start();
include("../funcs.php");

//データ取得
$surname = filter_input( INPUT_POST, "surname");
$name  = filter_input( INPUT_POST, "name");
$email  = filter_input( INPUT_POST, "email");
$pw = filter_input( INPUT_POST, "pw");
$pw = password_hash($pw, PASSWORD_DEFAULT);//hash化
$kanri_flg = filter_input( INPUT_POST, "kanri_flg");
$life_flg = filter_input( INPUT_POST, "life_flg");

//データ登録SQL作成
$pdo = db_conn();
$sql = "INSERT INTO ec_user_table (surname,name,email,pw,indate,kanri_flg,life_flg)VALUES(:surname,:name,:email,:pw,sysdate(),0,1)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':surname', $surname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pw', $pw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("login.php");
}
?>