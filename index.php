<?php
include('global_menu.php');
//URLの値を受けとり受け取った情報を呼び出す 
$result_list = $pdo->query('SELECT * FROM pages');
?>

<h1>メモ一覧</h1>
<a href="./create.php">メモを追加</a><br>
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