<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() 実行したときにエラーが出たら何のエラーかを教えてくれる
function db_conn(){
    try {
        $db_name = "ec_db";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無し or MAMPはパスワード”root”に修正してください。
        $db_host = "localhost"; //DBホスト
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
        
        // $db_name = 'yiir_ec_db';    //データベース名
        // $db_id   = 'yiir';      //アカウント名
        // $db_pw   = '';      //パスワード
        // $db_host = 'mysql57.yiir.sakura.ne.jp'; //DBホスト
        // return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);

    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }    
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}


//リダイレクト関数: redirect($file_name)
function redirect($page) {
    header("Location: ".$page);
    exit();
}

function sschk() {
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
        exit("Login Error");
    } else {
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}

//fileUpload("送信名","アップロード先フォルダ");
function fileUpload($fname,$path){
  if (isset($_FILES[$fname] ) && $_FILES[$fname]["error"] ==0 ) { //０は成功 1,2はエラー
      //ファイル名取得
      $file_name = $_FILES[$fname]["name"];
      //一時保存場所取得 /home/tmt/1.jpgみたいなのが入ってくる
      $tmp_path  = $_FILES[$fname]["tmp_name"];
      //拡張子取得 "jpg" "png"
      $extension = pathinfo($file_name, PATHINFO_EXTENSION);
      //ユニークファイル名作成 絶対被ることないsession_idを利用
      $file_name = date("YmdHis").md5(session_id()) . "." . $extension;
      // FileUpload [--Start--]
      $file_dir_path = $path.$file_name;//"uproad/...jpg"文字列ができる
      if ( is_uploaded_file( $tmp_path ) ) {
          if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
              chmod( $file_dir_path, 0644 );//読み込みの権限
              return $file_name; //成功時：ファイル名を返す
          } else {
              return 1; //失敗時：ファイル移動に失敗
          }
      }
   }else{
       return 2; //失敗時：ファイル取得エラー
   }
}

//送信できてないもしくは空の記載のエラー senderror();
function senderror($send){
  if(!isset($_POST[$send]) || $_POST[$send] == "") {
    exit("ParameError!(".$send.")");
  }
}

?>