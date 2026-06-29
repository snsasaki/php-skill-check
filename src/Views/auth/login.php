<h2>ログイン</h2>

<?php if (!empty($error)): ?>
  <p class="error"><?= e($error) ?></p>
<?php endif; ?>

<form method="POST" action="/?page=login">
  <div>
    <label for="email">メールアドレス</label>
    <input
      id="email"
      type="email"
      name="email"
      value="<?= e($old['email'] ?? '') ?>"
      placeholder="test@example.com">
  </div>

  <div>
    <label for="password">パスワード</label>
    <input id="password" type="password" name="password">
  </div>

  <button type="submit">ログイン</button>
</form>