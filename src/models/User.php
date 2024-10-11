<?php

namespace App\models;

use App\models\DatabaseManager;

class User
{
    public static function getUser(): array
    {
        $records = DatabaseManager::dbConnect()->prepare("SELECT * FROM users ORDER BY created_at");
    }

    public static function saveUser($data)
    {
        $stmt = DatabaseManager::dbConnect()->prepare("INSERT INTO users VALUES (:id, :email, :password, :created_at)");
        return $stmt->execute([
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':password' => $data['password']
        ]);
    }

    public static function isUserNameExists($data) {
        $stmt = DatabaseManager::dbConnect()->prepare("SELECT * FROM users WHERE name = :name LIMIT 1");
        return $stmt->execute([
            ':name' => $data['username']
        ]);
    }
}