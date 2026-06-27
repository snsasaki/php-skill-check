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

<p class="muted">README の「応用課題」に従って編集フォームを作成してください。</p>
<p><a class="btn" href="/">← 一覧へ戻る</a></p>
