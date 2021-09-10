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
$id = $_GET['id'];
//DELETE文を変数に格納
$sql = "DELETE FROM pages WHERE id = :id";
//値はからのままSQLの実行の準備
$stmt = $pdo->prepare($sql);
//削除するレコードのIDを配列に格納する
$params = array(':id'=>$_GET["id"]);
//削除するレコードのIDが入った変数をexecuteにセットしてSQLに実行
$stmt->execute($params);
//処理が終わったらトップページに遷移
header('Location: index.php');
?>

