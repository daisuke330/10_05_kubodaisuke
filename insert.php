<?php
include('functions.php');

// 入力チェック
if (
  !isset($_POST['name']) || $_POST['name'] == ''
) {
  exit('ParamError');
}

//POSTデータ取得
$name = $_POST['name'];
$comment = $_POST['comment'];

//Fileアップロードチェック
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  // ファイルをアップロードしたときの処理
  //アップロードしたファイルの情報取得
  $uploadedFileName = $_FILES['upfile']['name'];
  $tempPathName = $_FILES['upfile']['tmp_name'];
  $fileDirectoryPath = 'upload/';
  //File名の変更
  $extension = pathinfo($uploadedFileName, PATHINFO_EXTENSION);
  $uniqueName = date('YmdHis') . md5(session_id()) . "." . $extension;
  $fileNameToSave = $fileDirectoryPath . $uniqueName;
  // var_dump($fileNameToSave);
  // exit();

  // FileUpload開始
  if (is_uploaded_file($tempPathName)) {
    if (move_uploaded_file($tempPathName, $fileNameToSave)) {
      chmod($fileNameToSave, 0644);
      $img = '<img src="' . $fileNameToSave . '" >';
    } else {
      exit('ファイルの保存に失敗しました');
    }
  }
  // exit('error');
  else {
    exit('ファイルがアップロードされてません');
  }
  // exit('error');
  // FileUpload終了
} else {
  // ファイルをアップしていないときの処理
  $img = '画像が送信されていません';
}

//DB接続
$pdo = connectToDb();

//データ登録SQL作成
$sql = 'INSERT INTO board_table (id, name, comment, image, indate)
VALUES(NULL, :a1, :a2, :image, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $comment, PDO::PARAM_STR);
$stmt->bindValue(':image', $fileNameToSave, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  //index.phpへリダイレクト
  header('Location: select.php');
}
