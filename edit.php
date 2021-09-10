<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include('global_menu.php');
//URLの値を受けとり受け取った情報を呼び出す
$id = $_GET['id'];
$sql = "SELECT * FROM pages WHERE id IN (".$id.")";
$result_rows = $pdo->query($sql);
?>


<h1 style="text-align:center">メモ編集</h1>
<form action="update.php" method="post"> 
<?php
 foreach($result_rows as $row){
?>
<input type="hidden" name="id" value="<?php if (!empty($row['id'])) echo(htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'));?>">
  <table align="center">
    <tr>
      <td><p>title</p></td>
    </tr>
    <tr>
      <td><input type="text" name="title" value="<?php if (!empty($row['title'])) echo(htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'));?>"></td>
    </tr>
    <tr>
      <td><p>本文</p></td>
    </tr>
    <tr>
      <td><input type="text" name="content" value="<?php if (!empty($row['content'])) echo(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'));?>"></td>
    </tr>
    <tr>
      <td><input type="submit" value="更新"></td>
    </tr>  
  </table>
<?php
 }
?> 
</form>