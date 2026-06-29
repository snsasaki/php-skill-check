<?php

namespace App\Models;

class User
{
  public static function create(array $data): void
  {
    $stmt = db()->prepare(
      'INSERT INTO users (name, email, password) VALUES (?, ?, ?)'
    );

    $stmt->execute([
      $data['name'],
      $data['email'],
      password_hash($data['password'], PASSWORD_DEFAULT),
    ]);
  }

  public static function findByEmail(string $email): ?array
  {
    $stmt = db()->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    return $user ?: null;
  }
}
