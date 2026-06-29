<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Validators\BookValidator;

/**
 * 書籍コントローラ。リクエストを受けて Model を呼び、View を描画します。
 * index() は実装済みの見本です。残りのメソッドを課題で実装してください。
 */
class BookController
{
    // セッションにuserIDがあるかで認可処理
    private function requireLogin(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /?page=showlogin');
            exit;
        }
    }

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
        $this->requireLogin();

        $categories = Category::all();
        view('books/create', ['categories' => $categories, 'errors' => [], 'old' => []]);
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
        $this->requireLogin();

        $old = [
            'title' => trim($_POST['title'] ?? ''),
            'author' => trim($_POST['author'] ?? ''),
            'category_id'  => trim($_POST['category_id'] ?? ''),
            'price'  => trim($_POST['price'] ?? ''),
        ];

        $errors = (new BookValidator())->validate($old);

        if ($errors) {
            view('books/create', [
                'categories' => Category::all(),
                'errors' => $errors,
                'old' => $old,
            ]);
            return;
        }

        Book::create($old);

        header('Location: /?page=index&created=1');
        exit;
    }

    /** ★応用課題: 編集フォームの表示（?page=edit&id=...） */
    public function edit(): void
    {
        $this->requireLogin();

        $book = Book::find($_GET['id'] ?? null);
        view('books/edit', ['book' => $book, 'categories' => Category::all(), 'errors' => []]);
    }

    /** ★応用課題: 更新処理（POST） */
    public function update(): void
    {
        $this->requireLogin();

        $id = $_POST['id'] ?? '';

        $old = [
            'id' => (int)$id,
            'title' => trim($_POST['title'] ?? ''),
            'author' => trim($_POST['author'] ?? ''),
            'category_id'  => trim($_POST['category_id'] ?? ''),
            'price'  => trim($_POST['price'] ?? ''),
        ];

        $errors = (new BookValidator())->validate($old);

        if ($errors) {
            view('books/edit', [
                'categories' => Category::all(),
                'errors' => $errors,
                'book' => $old,
            ]);
            return;
        }

        Book::update($id, $old);

        header('Location: /?page=index&updated=1');
        exit;
    }

    /** ★応用課題: 削除処理 */
    public function delete(): void
    {
        $this->requireLogin();

        $id = $_POST['id'] ?? '';

        Book::delete((int)$id);
        header('Location: /?page=index&deleted=1');
        exit;
    }
}
