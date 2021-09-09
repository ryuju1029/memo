<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//データベース名、ユーザー名、パスワード
$dsn = 'mysql:dbname=pages;host=localhost;charset=utf8';
$user = 'root';
$password = 'root';
//MSQLのデータベース接続
$pdo = new PDO($dsn, $user, $password);
//値を受けとり受け取った情報を呼び出す
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
//UPDATE文を変数に格納
$sql = "UPDATE pages SET title = :title, content = :content WHERE id = :id";
//値はからのままSQLの実行の準備
$stmt = $pdo->prepare($sql);
//配列に格納
$params = array(':title' => $title,':content' => $content,':id' => $id,);
//値が入った変数をexecuteにセットしてSQL実行
$stmt->execute($params);
?>

<a href="index.php">投稿一覧へ</a>