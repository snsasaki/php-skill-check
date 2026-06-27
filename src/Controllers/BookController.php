<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Category;

/**
 * 書籍コントローラ。リクエストを受けて Model を呼び、View を描画します。
 * index() は実装済みの見本です。残りのメソッドを課題で実装してください。
 */
class BookController
{
    /** 一覧表示（実装済みの見本） */
    public function index(): void
    {
        $books = Book::all();
        view('books/index', ['books' => $books]);
    }

    /**
     * ★基礎課題: 新規登録フォームの表示
     * ヒント: Category::all() を取得して view('books/create', [...]) を描画する。
     *        バリデーションエラーや入力値を ?page=store からのリダイレクトで
     *        受け取り、フォームに再表示できるようにする（$_GET 経由など）。
     */
    public function create(): void
    {
        // TODO: ここを実装する
    }

    /**
     * ★基礎/応用課題: 登録処理（POST）
     * ヒント:
     *   - $_POST から値を受け取り trim()
     *   - 必須・文字数などをバリデーション（エラーは配列に貯める）
     *   - エラーがあれば create に戻す（PRG パターン: header('Location: ...'); exit;）
     *   - OK なら Book::create() して一覧へリダイレクト
     */
    public function store(): void
    {
        // TODO: ここを実装する
    }

    /** ★応用課題: 編集フォームの表示（?page=edit&id=...） */
    public function edit(): void
    {
        // TODO: ここを実装する
    }

    /** ★応用課題: 更新処理（POST） */
    public function update(): void
    {
        // TODO: ここを実装する
    }

    /** ★応用課題: 削除処理 */
    public function delete(): void
    {
        // TODO: ここを実装する
    }
}
