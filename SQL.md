# SQL 課題 📚（書籍管理データベース）

`database/app.sqlite` のデータに対して SQL を書く課題です。`books` / `categories` / `reviews` の 3 テーブルを使います。

## 実行方法

```bash
# SQLite に接続（サーバ不要）
sqlite3 database/app.sqlite

# 例: テーブル構造を確認
sqlite> .schema books
sqlite> SELECT * FROM books LIMIT 3;
sqlite> .quit
```

各問の SQL を `answers.sql` のようなファイルにまとめて提出してもOKです。

## テーブル

- `categories(id, name)`
- `books(id, title, author, category_id, price, published_at, created_at)`
- `reviews(id, book_id, reviewer, rating, comment, created_at)`

---

## 基礎 ⭐（SELECT / WHERE / ORDER BY / INSERT / UPDATE / DELETE）

1. すべての書籍を `price` の高い順に並べて、`title` と `price` だけ表示する。
2. `price` が 2500 円以上の書籍のタイトルを表示する。
3. 著者が「山田 太郎」の書籍を新しい（`published_at` が新しい）順に表示する。
4. 新しい書籍を 1 件 INSERT する（任意の値で。`category_id` は既存のものを使う）。
5. 4 で追加した書籍の `price` を 100 円値上げする UPDATE を書く。
6. 4 で追加した書籍を DELETE する。

**✅ チェック**: 1〜3 の結果が期待通り絞り込み・並び替えできている／4〜6 で 1 件の追加・更新・削除ができる。

---

## 応用 ⭐⭐（JOIN / GROUP BY）

7. 各書籍に**カテゴリ名**を添えて一覧表示する（`books` × `categories` の INNER JOIN）。
8. **カテゴリごとの書籍数**を、カテゴリ名つきで表示する（`GROUP BY` + `COUNT`）。書籍が 0 件のカテゴリも表示する（`LEFT JOIN`）。
9. カテゴリごとの**平均価格**を、平均価格の高い順に表示する（`GROUP BY` + `AVG`）。
10. レビューがついている書籍について、**書籍タイトルと平均評価（rating の平均）**を表示する（`books` × `reviews` の JOIN + `GROUP BY`）。

**✅ チェック**: JOIN で複数テーブルを正しく結合できる／GROUP BY と集計関数（COUNT/AVG）が使える／LEFT JOIN で 0 件のグループも出せる。

---

## 発展 ⭐⭐⭐（サブクエリ / ビュー / HAVING）

11. **平均価格より高い**書籍の一覧を表示する（サブクエリで全体の平均価格を求めて WHERE で比較）。
12. レビューの**平均評価が 4.0 以上**の書籍だけを表示する（`GROUP BY` + `HAVING`）。
13. 「カテゴリ名・書籍数・平均価格」を返す**ビュー** `category_summary` を作成し、その後 `SELECT * FROM category_summary;` で確認する。
14. 一度もレビューされていない書籍の一覧を表示する（`LEFT JOIN` で `reviews` が NULL のもの、または `NOT IN` のサブクエリ）。

**✅ チェック**: サブクエリ・HAVING・ビューが使える／「該当なし」を表現できる。

---

> ヒント: SQLite では `AVG()` は小数を返します。`ROUND(AVG(rating), 2)` のように丸めると見やすくなります。
