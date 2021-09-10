<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//データベース名、ユーザー名、パスワード
$dsn = 'mysql:dbname=pages;host=localhost;charset=utf8';
$user = 'root';
$password = 'root';
//MSQLのデータベース接続
$pdo = new PDO($dsn, $user, $password);
//URLの値を受けとり受け取った情報を呼び出す
$id = $_GET['id'];
$sql = "SELECT * FROM pages WHERE id IN (".$id.")";
$result_rows = $pdo->query($sql);

?>

<form action="update.php" method="post">
    <?php
    foreach($result_rows as $row){
    ?>
    <input type="hidden" name="id" value="<?php if (!empty($row['id'])) echo(htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'));?>">
    <p>title</p>
    <input type="text" name="title" value="<?php if (!empty($row['title'])) echo(htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'));?>">
    <p>本文</p>
    <input type="text" name="content" value="<?php if (!empty($row['content'])) echo(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'));?>"><br>
    <?php
    }
    ?>
    <input type="submit" value="更新">
</form>    