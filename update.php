<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('initPdo.php');
//値を受けとり受け取った情報を呼び出す
$content = filter_input(INPUT_POST, "content");
$title = filter_input(INPUT_POST, "title");
$id = filter_input(INPUT_POST, "id");
//UPDATE文を変数に格納
$sql = "UPDATE pages SET title = :title, content = :content WHERE id = :id";
//値はからのままSQLの実行の準備
$pdo = initPdo();
$stmt = $pdo->prepare($sql);
//配列に格納
$params = array(':title' => $title,':content' => $content,':id' => $id,);
//値が入った変数をexecuteにセットしてSQL実行
$stmt->execute($params);
//処理が終わったらトップページに遷移
header('Location: index.php');
?>

