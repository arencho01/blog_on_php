<?php
namespace App\models;

use App\models\DatabaseManager;
use PDO;


class Post {

    // Получаю все статьи
    public static function getAllPosts(): false|array
    {
        $db = DatabaseManager::dbConnect();
        $stmt = "
                    SELECT * 
                    FROM posts
                    ORDER BY created_at DESC
                ";

        $result = $db->prepare($stmt);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPost($id)
    {
        $db = DatabaseManager::dbConnect();
        $stmt = "
                    SELECT * 
                    FROM posts 
                    WHERE id = {$id}
                ";

        $stmt = $db->prepare($stmt);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function searchPosts($query): false|array
    {
        $db = DatabaseManager::dbConnect();

        $stmt = "
                    SELECT `id`, `title`, `content`
                    FROM `posts`
                    WHERE `id`      LIKE '%{$query}%' OR
                          `title`   LIKE '%{$query}%' OR
                          `content` LIKE '%{$query}%'
                          
                 ";

        $stmt = $db->prepare($stmt);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return !empty($result) ? $result : false;
    }

    public static function addPost($title, $content)
    {
        $db = DatabaseManager::dbConnect();

        $stmt = "
                    INSERT INTO `posts` (`title`, `content`)
                    VALUES (:title, :content)
                ";

        $stmt = $db->prepare($stmt);
        $stmt->execute([
            ':title' => $title,
            ':content' => $content
        ]);

        $stmt = "
                    SELECT LAST_INSERT_ID();
                ";

        $stmt = $db->prepare($stmt);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}