<?php

namespace App\models;

use PDO;
use App\models\DatabaseManager;
use PDOException;

class User
{

    public static function isUserNameTaken($username): bool
    {
        $db = DatabaseManager::dbConnect();
        $stmt = "
                    SELECT COUNT(*)
                    FROM `users` 
                    WHERE `name` = :username
                ";

        $stmt = $db->prepare($stmt);
        $stmt->execute(["username" => $username]);

        return $stmt->fetchColumn() > 0;
    }

    public static function addUser($name, $password): bool
    {
        try {
            $db = DatabaseManager::dbConnect();
            $stmt = "
                        INSERT INTO users (name, password)
                        VALUES (:name, :password)
                    ";

            $stmt = $db->prepare($stmt);

            return $stmt->execute([
                ':name' => $name,
                ':password' => $password
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }


    public static function getUserPassword($username)
    {
        $db = DatabaseManager::dbConnect();
        $stmt = "
                    SELECT `password`
                    FROM users
                    WHERE `name` = :username
                    LIMIT 1
                ";
        $stmt = $db->prepare($stmt);
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['password'];
    }

}