<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php'); ?>
</head>

<body>
  <wrapper id="wrap">
    <div class="inbox">
      <header>
        <h1>MYBBS(掲示板)</h1>
      </header>
      <main id="app">
        <h2>投稿機能</h2>
        <div class="inner">
          <form action="input_do.php" method="post">
            <dl>
              <dt>ニックネーム</dt>
              <dd>
                <input type="text" name="name" v-model="name" />
              </dd>
            </dl>
            <dl>
              <dt>投稿内容</dt>
              <dd>
                <textarea name="memo" v-model="message"></textarea>
              </dd>
            </dl>
            <button type="submit">投稿する</button>
          </form>
        </div>
      </main>
    </div>
  </wrapper>
</body>

</html>