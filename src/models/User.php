<?php

namespace App\models;

use PDO;
use App\models\DatabaseManager;

class User
{

    public static function isUserNameTaken($username): bool
    {
        $username = htmlspecialchars($username, ENT_QUOTES);

        $stmt = DatabaseManager::dbConnect()->prepare("SELECT COUNT(*) FROM users WHERE name = :username");
        $stmt->execute(['username' => $username]);

        return $stmt->fetchColumn() > 0;
    }

    public static function addUser($name, $password): bool
    {
        $name = htmlspecialchars($name, ENT_QUOTES);
        $password = htmlspecialchars($password, ENT_QUOTES);

        $stmt = DatabaseManager::dbConnect()->prepare("INSERT INTO users (name, password) VALUES (:name, :password)");
        return $stmt->execute([
            ':name' => $name,
            ':password' => $password
        ]);
    }

    public static function checkUserPassByUserName($username)
    {
        $username = htmlspecialchars($username, ENT_QUOTES);
        $stmt = DatabaseManager::dbConnect()->prepare("SELECT password FROM users WHERE name = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['password'];
    }
}