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

<p class="muted">README の「基礎課題」に従って登録フォームを作成してください。</p>

<form action="" method="post">
  <td><input type="text" name="title" placeholder="タイトル"></td>
  <td><input type="text" name="author" placeholder="著者"></td>
  <td>
    <select name="category_id" id="category_id">
      <option value="技術書">技術書</option>
      <option value="小説">小説</option>
      <option value="ビジネス">ビジネス</option>
      <option value="デザイン">デザイン</option>
      <option value="専門誌">専門誌</option>
    </select>
  </td>
  <td><input type="text" name="price">価格</td>
</form>

<p><a class="btn" href="/">← 一覧へ戻る</a></p>