<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php'); ?>
</head>
<?php
require('dbconnect.php');
$counts = $db->query('SELECT COUNT(*) as cnt FROM items');
$count = $counts->fetch();
$id = ((int)$count['cnt']) + 1;
$statement = $db->prepare('INSERT INTO items SET id=?, name=?, time=NOW(), text=?');
$statement->execute(array($id, $_POST['name'], $_POST['memo']));
?>

<body>
  <wrapper id="wrap">
    <div class="inbox">
      <header>
        <h1>MYBBS(掲示板)</h1>
      </header>
      <main>
        <h2>投稿が登録されました。</h2>
        <div class="inner">

          <a href="index.php">一覧へもどる</a>
        </div>
      </main>
    </div>
  </wrapper>
</body>

</html>