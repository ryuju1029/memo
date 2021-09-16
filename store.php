<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('initPdo.php');
require_once('redirect.php');

//投稿した値を受けとり変数に格納
$content = filter_input(INPUT_POST, "content");
$title = filter_input(INPUT_POST, "title");
//INSERT文を変数に格納
$sql = "INSERT INTO pages (title, content) VALUES (:title, :content)";

$pdo = initPdo();
//値はからのままSQLの実行の準備
$stmt = $pdo->prepare($sql);

//値が入った変数をexecuteにセットしてSQL実行
$stmt->bindValue(':title', $title);
$stmt->bindValue(':content', $content);
$stmt->execute();

//処理が終わったらトップページに遷移
redirect('index.php');