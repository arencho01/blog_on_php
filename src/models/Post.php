<?php
namespace App\models;

use PDO;
use App\models\DatabaseManager;


class Post {

    // Получаю все статьи
    public static function getAllPosts(): false|array
    {
        $stmt = DatabaseManager::dbConnect()->prepare("SELECT * FROM posts ORDER BY created_at DESC LIMIT 3");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPost($id)
    {
        $stmt = DatabaseManager::dbConnect()->prepare("SELECT * FROM posts WHERE id = {$id}");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}