<?php
session_start();
include("funcs.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $pdo = db_conn();
    $sql = "SELECT * ec_table WHERE user" 
    $stmt = $pdo->prepare("SELECT * FROM likes WHERE user_id = :user_id_id");
    $stmt->bindParam(':user_id_id', $user_id_id, PDO::PARAM_INT);
    $status = $stmt->execute();    
}


?>