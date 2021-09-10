<?php
include('global_menu.php');
//URLの値を受けとり受け取った情報を呼び出す
  if (isset($_POST['new'])){ 
   $result_list = $pdo->query('SELECT * FROM pages ORDER BY created_at DESC');
  }elseif(isset($_POST['content'])){
    $content = $_POST["content"];
    $result_list = $pdo->query("SELECT * FROM pages WHERE content LIKE '%$content%'");  
  }else{
   $result_list = $pdo->query('SELECT * FROM pages ');
  }
?>
<form action="index.php" method="post">   
  <input type="text" name="content" placeholder="Search..">
  <input type="submit">
</form>
<h1>メモ一覧</h1>
<a href="./create.php">メモを追加</a><br>
　<form action="index.php" method="post" style="text-align:right">
    <button type="submit" name="new" style="text-align: right">新しい順</button>
    <button type="submit" name="old" style="text-align: right">古い順</button>
　</form>
<table border="1" cellspacing="0" width="100%">
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
    <td align="center"><?php echo $row['title']; ?></td>
    <td align="center"><?php echo $row['content']; ?></td>
    <td align="center"><?php echo $row['created_at']; ?></td>
    <td align="center"><a href="edit.php?id=<?php echo $row['id']; ?>">編集</a></td>
    <td align="center"><a href="delete.php?id=<?php echo $row['id']; ?>">削除</a></td>
  </tr>

<?php
}
?>
</table>