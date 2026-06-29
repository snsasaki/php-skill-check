<?php

/**
 * ★基礎課題: 新規登録フォームのビュー
 *
 * ここに登録フォームを実装してください。要件は README.md の「基礎課題」を参照。
 * 用意されている変数（BookController::create() から渡す想定）:
 *   $categories : カテゴリ一覧（Category::all() の結果）
 *   $errors     : バリデーションエラーの配列（再表示用、任意）
 *   $old        : 直前の入力値の配列（入力値保持用、任意）
 *
 * ヒント:
 *   - <form method="post" action="/?page=store"> で送信する
 *   - <input name="title">, <textarea>, <select name="category_id"> など
 *   - 値の出力は必ず e(...) でエスケープする（XSS 対策）
 *   - エラーがあれば <p class="error"> で表示する
 */
$title = '新規登録';
?>

<h2>新規書籍登録（このページを実装してください）</h2>

<form method="post" action="/?page=store">
  <tr>
    <input
      id="title"
      type="text"
      name="title"
      placeholder="タイトル"
      value="<?= e($old['title'] ?? '') ?>">
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
      value="<?= e($old['author'] ?? '') ?>">
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
          <?= (string)($old['category_id'] ?? '') === (string)$category['id'] ? 'selected' : '' ?>>
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
      value="<?= e($old['price'] ?? '') ?>">
    <?php if (!empty($errors['price'])): ?>
      <p class="error"><?= e($errors['price']) ?></p>
    <?php endif; ?>
  </tr>

  <button type="submit">登録する</button>
</form>

<p><a class="btn" href="/">← 一覧へ戻る</a></p>