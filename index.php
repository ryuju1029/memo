<h1>メモ一覧</h1>
<a href="./create.php">メモを追加</a><br>

<!-- データベースへ登録   -->
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
$result_list = $pdo->query('SELECT * FROM pages');

?>

<table>
  <tr>
    <th>タイトル</th>
    <th>内容</th>
    <th>作成日時</th>
    <th>編集</th>
    <th>削除</th>
  </tr>

<?php
foreach($result_list as $row){
?>
  <tr>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['content']; ?></td>
    <td><?php echo $row['created_at']; ?></td>
    <td><a href="edit.php?id=<?php echo $row['id']; ?>">編集</a></td>
    <td><a href="delete.php?id=<?php echo $row['id']; ?>">削除</a></td>
  </tr>

<?php
}
?>
</table>