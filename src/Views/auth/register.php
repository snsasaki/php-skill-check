<h2>ユーザー新規作成</h2>

<form method="POST" action="/?page=register">
  <div>
    <label for="name">名前</label>
    <input id="name" type="text" name="name" value="<?= e($old['name'] ?? '') ?>">
  </div>

  <div>
    <label for="email">メールアドレス</label>
    <input id="email" type="email" name="email" value="<?= e($old['email'] ?? '') ?>" placeholder="test@example.com">
  </div>

  <div>
    <label for="password">パスワード</label>
    <input id="password" type="password" name="password">
  </div>

  <button type="submit">登録</button>
</form>