<?php

namespace App\controllers;

use App\models\User;
use App\views\View;
use App\services\Validator;

class UserController
{
    static string $urlPostIndex = "index.php?controller=post&action=index";

    public static function registration(): void
    {
        if($_SERVER["REQUEST_METHOD"] === 'POST')
        {
            $name = Validator::sanitizeInput($_POST['userName']) ?? '';
            $password = Validator::sanitizeInput($_POST['userPass']) ?? '';
            $confirmPass = Validator::sanitizeInput($_POST['userPassConfirm']) ?? '';

            $errors = Validator::validateRegisterFields($name, $password, $confirmPass);

            if (User::isUserNameTaken($name)) {
                $errors['userName'] = 'Пользователь с таким логином уже существует';
            }

            if (empty($errors)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                if (User::addUser($name, $hashedPassword)) {
                    $_SESSION['user'] = $name;
                    self::redirect(self::$urlPostIndex);
                }

            } else {
                View::render('user/registration', ['errors' => $errors]);
                return;
            }
        }
        View::render('user/registration');
    }

    public static function login(): void
    {
        if($_SERVER["REQUEST_METHOD"] === 'POST')
        {
            $name = htmlspecialchars(trim($_POST['userName']), ENT_QUOTES) ?? '';
            $password = htmlspecialchars(trim($_POST['userPass']), ENT_QUOTES) ?? '';

            $errors = Validator::validateLoginFields($name, $password);

            if(!empty($errors)) {
                View::render('user/login', ['errors' => $errors]);
                return;
            }

            if (User::getUserPassword($name) != $password) {
                $errors['userPass'] = 'Неправильный пароль';
                View::render('user/login', ['errors' => $errors]);
                return;
            }

            $_SESSION['user'] = $name;
            self::redirect(self::$urlPostIndex);
        }

        View::render('user/login');
    }

    public static function logout(): void
    {
        if (self::checkAuth()) {
            $_SESSION['user'] = null;
            self::redirect(self::$urlPostIndex);
        }
    }

    public static function checkAuth(): bool
    {
        return !empty($_SESSION['user']);
    }

    public static function redirect($url): void
    {
        header('Location: ' . $url);
        die();
    }
}