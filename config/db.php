<?php

/**
 * PDO で SQLite データベースに接続する。
 * database/app.sqlite が無ければ schema.sql から自動作成＆シードする。
 * （環境構築済みにするための初期化。通常は触らなくてよい）
 */
function db(): PDO
{
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $dbFile = __DIR__ . '/../database/app.sqlite';
    $needsInit = !file_exists($dbFile);

    if (!is_dir(dirname($dbFile))) {
        mkdir(dirname($dbFile), 0777, true);
    }

    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec('PRAGMA foreign_keys = ON;');

    if ($needsInit) {
        $sql = file_get_contents(__DIR__ . '/../schema.sql');
        $pdo->exec($sql);
    }

    return $pdo;
}
