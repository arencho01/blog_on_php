<?php
namespace Blog\Models;

use PDO;
use PDOException;


class Post {
    private static $db;
    private static $host = "mysql";
    private static $dbname = "my_db";
    private static $user = "user";
    private static $pass = "123456";
    private static $charset = "utf8mb4";


    private static function dbConnect(): void
    {
        try {
            self::$db = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbname, self::$user, self::$pass);
        } catch (PDOException $e) {
            echo "Ошибка подключения: " . $e->getMessage();
            exit;
        }
    }

    // Получаю все статьи
    public static function getAllPosts()
    {
        self::dbConnect();
        $stmt = self::$db->prepare("SELECT * FROM posts ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


//    public function getPosts(): false|array
//    {
//        return (new DatabaseModel())->query('SELECT * FROM articles');
//    }
}