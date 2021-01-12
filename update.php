<?php require('dbconnect.php'); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php'); ?>
</head>
<?php
//エラー対策
if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $memos = $db->prepare('SELECT * FROM items WHERE id=?');
  $memos->execute(array($id));
  $memo = $memos->fetch();
}
?>

<body>

  <wrapper id="wrap">
    <div class="inbox">
      <header>
        <h1>MYBBS(掲示板)</h1>
      </header>
      <main>
        <h2>編集機能</h2>
        <div class="inner">
          <form action="update_do.php" method="post">
            <input type="hidden" name="id" value="<?php print($id); ?>" />
            <textarea name="memo"><?php print($memo['text']); ?></textarea>
            <br />
            <button type="submit">変更する</button>
          </form>
        </div>
      </main>
    </div>
  </wrapper>
</body>

</html>