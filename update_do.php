<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php'); ?>
</head>
<?php
require('dbconnect.php');
$statement = $db->prepare('UPDATE items SET text=? WHERE id=?');
$statement->execute(array($_POST['memo'], $_POST['id']));
?>

<body>
  <wrapper id="wrap">
    <div class="inbox">
      <header>
        <h1>MYBBS(掲示板)</h1>
      </header>
      <main>
        <h2>変更されました。</h2>
        <div class="inner">
          <a href="index.php">一覧へもどる</a>
        </div>
      </main>
    </div>
  </wrapper>
</body>

</html>