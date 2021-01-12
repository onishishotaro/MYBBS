<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php'); ?>

</head>
<?php
require('dbconnect.php'); //DB読み込み

//エラー対策
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
  $page = $_REQUEST['page'];
} else {
  $page = 1;
}

//5件ページネーション
$start = 5 * ($page - 1);
$memos = $db->prepare('SELECT * FROM items ORDER BY id DESC LIMIT ?,5');
$memos->bindParam(1, $start, PDO::PARAM_INT);
$memos->execute();
?>

<body>
  <wrapper id="wrap">
    <div class="inbox">
      <header>
        <h1>MYBBS(掲示板)</h1>
      </header>
      <main>
        <h2>一覧表示機能</h2>
        <div class="inner">

          <div class="input_btn_wrap">
            <a class="input_btn" href="input.php">投稿画面へ</a>
          </div>
          <div class="article-warp">
            <?php while ($memo = $memos->fetch()) : ?>
              <article>
                <a href="detail.php?id=<?php print($memo['id']) ?>">
                  <span class="name"><?php print($memo['name']); ?></span>
                  <time>2<?php print($memo['time']); ?></time>
                  <p class="txt"><?php print(mb_substr($memo['text'], 0, 50)); ?></p>
                </a>
              </article>
            <?php endwhile; ?>
          </div>
          <div class="page-wrap flex flex-jc">
            <?php if ($page >= 2) : ?>
              <a class="page_ne" href="index.php?page=<?php print($page - 1); ?>"><?php print($page - 1); ?>ページ目へ</a>
            <?php endif ?>
            <?php
            $counts = $db->query('SELECT COUNT(*) as cnt FROM items');
            $count = $counts->fetch();
            $max_page = ceil($count['cnt'] / 5);
            if ($page < $max_page) :
            ?>

              <a class="page_ne" href="index.php?page=<?php print($page + 1); ?>"><?php print($page + 1); ?>ページ目へ</a>
            <?php endif; ?>
          </div>
        </div>

      </main>
    </div>
  </wrapper>
</body>

</html>