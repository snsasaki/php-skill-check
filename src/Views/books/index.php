<?php /** @var array $books */ ?>
<?php $title = '書籍一覧'; ?>

<?php if (!empty($_GET['created'])): ?>
  <p class="flash">書籍を登録しました。</p>
<?php endif; ?>

<h2>書籍一覧（<?= count($books) ?> 件）</h2>

<table>
  <thead>
    <tr>
      <th>ID</th><th>タイトル</th><th>著者</th><th>カテゴリ</th><th>価格</th><th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($books as $book): ?>
      <tr>
        <td><?= e($book['id']) ?></td>
        <td><?= e($book['title']) ?></td>
        <td><?= e($book['author']) ?></td>
        <td><?= e($book['category_name']) ?></td>
        <td>¥<?= number_format((int) $book['price']) ?></td>
        <td>
          <!-- ★応用課題: 編集・削除リンクを有効化する -->
          <a class="btn" href="/?page=edit&id=<?= e($book['id']) ?>">編集</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<p class="muted">※ この一覧は実装済みの見本です。新規登録・編集・削除を課題で実装してください。</p>
