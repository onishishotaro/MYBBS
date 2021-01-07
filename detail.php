<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php'); ?>

</head>
<?php
require('dbconnect.php');
$id = $_REQUEST['id'];
if (!is_numeric($id) || $id <= 0) {
  print('1以上の数字で指定してください');
  exit();
}

$memos = $db->prepare('SELECT * FROM items WHERE id=?');
$memos->execute(array($id));
$memo = $memos->fetch();
?>

<body>
  <wrapper id="wrap">
    <div class="inbox">
      <header>
        <h1>MYBBS(掲示板)</h1>
      </header>
      <main id="app">
        <h2>詳細画面</h2>
        <div class="inner">
          <article class="detail-wrap">
            <p class="txt"><?php print($memo['text']) ?></p>
          </article>
          <a class="insert" href="update.php?id=<?php print($memo['id']); ?>">編集</a>
          <a class="delete" href="delete.php?id=<?php print($memo['id']); ?>">削除</a>
          <a href="index.php">戻る</a>
        </div>
      </main>
    </div>
  </wrapper>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="js/main.js"></script>
</body>

</html>