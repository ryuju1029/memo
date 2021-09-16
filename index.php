<?php

require_once('initPdo.php');


// URLの値を受けとり受け取った情報を呼び出す
$order = filter_input(INPUT_GET, "order") ?? 'desc';
$content = filter_input(INPUT_GET, "content");

// 初期値
$sql = 'SELECT * FROM pages';

// 検索ワードがあれば、初期SQLに追記する
if (!is_null($content)) {
  $sql .= " WHERE content LIKE '%$content%'";
}
// 並び順を指定するSQLを追記
$sql .= ' ORDER BY created_at ' . $order;

$pdo = initPdo();
// データの取得
$pages = $pdo->query($sql);

?>

<form action="index.php" method="GET">
  <input type="text" name="content" placeholder="Search.." value="<?php echo $content; ?>">
  <input type="submit" value="検索">
</form>

<h1>メモ一覧</h1>
<p><a href="./create.php">メモを追加</a></p>

<form action="index.php" method="GET">
  <label>
    <input type="radio" name="order" value="desc" style="text-align: right" <?php if ($order === 'desc'): ?> checked <?php endif; ?>>
    新しい順
  </label>
  <label>
    <input type="radio" name="order" value="asc" style="text-align: right" <?php if ($order === 'asc'): ?> checked <?php endif; ?>>
    古い順
  </label>
  <input type="submit" value="並び替え">
</form>

<table border="1" cellspacing="0" width="100%">
  <tr>
    <th>タイトル</th>
    <th>内容</th>
    <th>作成日時</th>
    <th>編集</th>
    <th>削除</th>
  </tr>

  <?php foreach ($pages as $page) : ?>
    <tr>
      <td align="center"><?php echo $page['title']; ?></td>
      <td align="center"><?php echo $page['content']; ?></td>
      <td align="center"><?php echo $page['created_at']; ?></td>
      <td align="center"><a href="edit.php?id=<?php echo $page['id']; ?>">編集</a></td>
      <td align="center"><a href="delete.php?id=<?php echo $page['id']; ?>">削除</a></td>
    </tr>
  <?php endforeach; ?>
</table>