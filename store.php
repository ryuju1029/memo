<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include('global_menu.php');
//URLの値を受けとり受け取った情報を呼び出す 
$result_list = $pdo->query('SELECT * FROM pages');
//投稿した値を受けとり変数に格納
$title = $_POST['title'];
$content = $_POST['content'];
//INSERT文を変数に格納
$sql = "INSERT INTO pages (title, content) VALUES (:title, :content)";
//値はからのままSQLの実行の準備
$stmt = $pdo->prepare($sql);
//配列に格納
$params = array(':title' => $title,':content' => $content,);
//値が入った変数をexecuteにセットしてSQL実行
$stmt->execute($params);
//処理が終わったらトップページに遷移
header('Location: index.php');
?>