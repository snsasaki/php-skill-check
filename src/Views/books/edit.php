<?php

/**
 * ★応用課題: 編集フォームのビュー
 *
 * 既存の値をフォームに初期表示し、/?page=update へ送信して更新します。
 * 用意されている変数（BookController::edit() から渡す想定）:
 *   $book       : 編集対象の書籍（Book::find($id) の結果）
 *   $categories : カテゴリ一覧
 *   $errors     : バリデーションエラー（任意）
 *
 * ヒント:
 *   - <form method="post" action="/?page=update"> に <input type="hidden" name="id" value="...">
 *   - 既存値を value= に入れて初期表示（必ず e(...) でエスケープ）
 */
$title = '編集';
?>

<h2>書籍の編集（このページを実装してください）</h2>

<form method="post" action="/?page=update">

  <input type="hidden" name="id" value="<?= e($book['id']) ?>">

  <tr>
    <input
      id="title"
      type="text"
      name="title"
      placeholder="タイトル"
      value="<?= e($book['title'] ?? '') ?>">
    <?php if (!empty($errors['title'])): ?>
      <p class="error"><?= e($errors['title']) ?></p>
    <?php endif; ?>
  </tr>

  <tr>
    <input
      id="author"
      type="text"
      name="author"
      placeholder="著者"
      value="<?= e($book['author'] ?? '') ?>">
    <?php if (!empty($errors['author'])): ?>
      <p class="error"><?= e($errors['author']) ?></p>
    <?php endif; ?>
  </tr>

  <tr>
    <select id="category_id" name="category_id">
      <option value="" selected disabled>カテゴリを選択してください</option>
      <?php foreach ($categories as $category): ?>
        <option
          value="<?= e($category['id']) ?>"
          <?= (string)($book['category_id'] ?? '') === (string)$category['id'] ? 'selected' : '' ?>>
          <?= e($category['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <?php if (!empty($errors['category_id'])): ?>
      <p class="error"><?= e($errors['category_id']) ?></p>
    <?php endif; ?>
  </tr>

  <tr>
    <input
      id="price"
      type="text"
      name="price"
      placeholder="価格"
      value="<?= e($book['price'] ?? '') ?>">
    <?php if (!empty($errors['price'])): ?>
      <p class="error"><?= e($errors['price']) ?></p>
    <?php endif; ?>
  </tr>

  <button type="submit">更新する</button>
</form>
<p><a class="btn" href="/">← 一覧へ戻る</a></p>