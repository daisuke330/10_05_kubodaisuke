<?php
include('functions.php');


// 入力チェック
if (
    !isset($_POST['name']) || $_POST['lid'] == '' ||
    !isset($_POST['lpw'])
) {
    exit('ParamError');
}

//POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//DB接続
$pdo = connectToDb();

//データ登録SQL作成
$sql = 'INSERT INTO user_table (id, name, lid, lpw, kanri_flg, life_flg)
VALUES(NULL, :a1, :a2, :a3, 1, 0)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if ($status == false) {
    showSqlErrorMsg($stmt);
} else {
    //index.phpへリダイレクト
    header('Location: index.php');
}
exit('error');
