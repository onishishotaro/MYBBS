<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php'); ?>
</head>
<?php
require('dbconnect.php');
if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $statement = $db->prepare('DELETE FROM items WHERE id=?');
  $statement->execute(array($id));
}
?>

<body>
  <wrapper id="wrap">
    <div class="inbox">
      <header>
        <h1>MYBBS(掲示板)</h1>
      </header>
      <main>
        <h2>投稿が削除されました。</h2>
        <div class="inner">
          <a href="index.php">一覧へもどる</a>
        </div>
      </main>
    </div>
  </wrapper>

</body>

</html>

<!--

<?php require_once(dirname(__FILE__) . '/inc.footer.php'); ?> -->