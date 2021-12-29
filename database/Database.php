<?php

namespace Db;

use PDO;
use PDOException;

// init pdo

class Database
{
    private static string $dsn = 'sqlite:database/_db.db';
    private static string $username = '';
    private static string $password = '';
    private static array $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    private static ?PDO $pdo = null;

    public static function getDatabase(): PDO
    {
        if (is_null(self::$pdo)) {
            try {
                self::$pdo = new PDO(self::$dsn, self::$username, self::$password, self::$options);
            } catch (PDOException $e) {
                echo $e;
            }
        }

        return self::$pdo;
    }
}
