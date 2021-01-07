<?php
try {
    $db = new PDO('mysql:dbname=mybbs;host=localhost;port=8888;charset=utf8', 'root', 'root');
} catch (PDOException $e) {
    echo 'DB接続エラー:' . $e->getMessage();
}
