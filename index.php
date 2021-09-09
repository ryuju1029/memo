<h1>メモ一覧</h1>
<a href="./create.php">メモを追加</a><br>

<!-- データベースへ登録   -->
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
  $dsn = 'mysql:dbname=pages;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'root';
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $title = $_POST['title'];
  $content = $_POST['content'];
  $sql = "INSERT INTO pages (title, content) VALUES (:title, :content)";
  $stmt = $pdo->prepare($sql);
  $params = array(':title' => $title,':content' => $content,);
  $stmt->execute($params);

} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'. $e->getMessage());
}

$sql = "SELECT * FROM pages";
$stmt = $pdo->query($sql);
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
foreach($stmt as $row){
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