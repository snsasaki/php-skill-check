<?php

namespace App\Controllers;

class AuthController
{
  public function showLogin(): void
  {
    view('auth/login', ['error' => [], 'old' => []]);
  }
  public function login(): void
  {
    // TODO
  }

  public function showRegiste(): void
  {
    // TODO
  }

  public function register(): void
  {
    // TODO
  }

  public function showRegister(): void
  {
    // TODO
  }

  public function logout(): void
  {
    // TODO
  }
}
