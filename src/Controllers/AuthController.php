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
    view('auth/register', ['error' => '', 'old' => []]);
  }

  public function register(): void
  {
    $old = [
      'name' => trim($_POST['name'] ?? ''),
      'email' => trim($_POST['email'] ?? ''),
    ];

    $password = $_POST['password'] ?? '';

    if ($old['name'] === '' || $old['email'] === '' || $password === '') {
      view('auth/register', [
        'error' => '名前、メールアドレス、パスワードを入力してください。',
        'old' => $old,
      ]);
      return;
    }

    if (User::findByEmail($old['email']) !== null) {
      view('auth/register', [
        'error' => 'このメールアドレスはすでに登録されています。',
        'old' => $old,
      ]);
      return;
    }

    User::create([
      'name' => $old['name'],
      'email' => $old['email'],
      'password' => $password,
    ]);

    header('Location: /?page=showlogin');
    exit;
  }

  public function logout(): void
  {
    $_SESSION = [];

    session_destroy();

    header('Location: /?page=showlogin');
    exit;
  }
}
