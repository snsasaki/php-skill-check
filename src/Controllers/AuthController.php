<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
  public function showLogin(): void
  {
    view('auth/login', ['error' => [], 'old' => []]);
  }
  public function login(): void
  {
    $old = [
      'email' => trim($_POST['email'] ?? ''),
    ];

    $password = $_POST['password'] ?? '';

    if ($old['email'] === '' || $password === '') {
      view('auth/login', [
        'error' => 'メールアドレスとパスワードを入力してください。',
        'old' => $old,
      ]);
      return;
    }

    $user = User::findByEmail($old['email']);

    if ($user === null || !password_verify($password, $user['password'])) {
      view('auth/login', [
        'error' => 'メールアドレスまたはパスワードが正しくありません。',
        'old' => $old,
      ]);
      return;
    }

    $_SESSION['user_id'] = $user['id'];

    header('Location: /?page=index');
    exit;
  }

  public function showRegister(): void
  {
    // TODO
  }

  public function register(): void
  {
    // TODO
  }

  public function logout(): void
  {
    // TODO
  }
}
