<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
checkSessionId();


$menu = menu();

//1.  DB接続します
$pdo = connectToDb();

//２．データ登録SQL作成
$sql = 'SELECT * FROM board_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
// 送られてきたセッション変数のログインID部分を代入
$lid = $_SESSION['lid'];
$name = $_SESSION['name'];
// var_dump($lid);

// $sql2 = 'SELECT*FROM user_table';
// $stmt2 = $pdo->prepare($sql2);
// $status2 = $stmt2->execute();

//３．データ表示
$view = '';
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<li class="list-group-item">';
    $view .= '<p>' . $result['indate'] . '</p><p>' . $result['name'] . '</p><p>' . $result['comment'] . '</p>';
    $view .= '</li>';
    $img = $result['image'];
    $view .= '<img src="' . $img . '" width="150" alt="画像">';
  }
}

// $view2 = '';
// $result2 = '';
// $result2 = $stmt2->fetch(POD::FETCH_ASSOC);
// $view2 = $result2['name'];

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>todoリスト表示</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <style>
    div {
      padding: 10px;
      font-size: 16px;
    }
  </style>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">掲示板</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?= $menu ?>
        </ul>
      </div>
    </nav>
  </header>
  <form method="post" action="insert.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">name</label>
      <!-- nameにログインIDを入れる -->
      <input type="text" class="form-control" id="name" name="name" value='<?= $name ?>'>
    </div>
    <div class="form-group">
      <label for="comment">Comment</label>
      <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="upfile">画像のアップロード</label>
      <input type="file" name="upfile" accept="image/*">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  <div>
    <ul class="list-group">
      <?= $view ?>
    </ul>
  </div>

</body>

</html>