<?php

namespace App\Models;

use PDO;

class Category
{
    /** カテゴリを全件取得する */
    public static function all(): array
    {
        $stmt = db()->query('SELECT * FROM categories ORDER BY id');
        return $stmt->fetchAll();
    }
}
