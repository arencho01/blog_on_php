<?php
namespace App\models;

use PDO;
use PDOException;

class Settings {
    private static string $host = "mysql";
    private static string $dbname = "my_db";
    private static string $user = "user";
    private static string $pass = "123456";
    private static string $charset = "utf8mb4";


    public static function dbConnect()
    {
        try {
            return new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbname . ';charset=' .self::$charset, self::$user, self::$pass);
        } catch (PDOException $e) {
            echo "Ошибка подключения: " . $e->getMessage();
            exit;
        }
    }
}