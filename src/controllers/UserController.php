<?php

namespace App\controllers;

use App\models\User;
use App\views\viewCore\View;

class UserController
{
    static string $urlPostIndex = "index.php?controller=post&action=index";

    public static function registration(): void
    {
        if($_SERVER["REQUEST_METHOD"] === 'POST')
        {
            $name = trim($_POST['userName']) ?? '';
            $password = trim($_POST['userPass']) ?? '';
            $confirmPass = trim($_POST['userPassConfirm']) ?? '';

            $errors = self::checkInputEnter($name, $password, $confirmPass);

            if (User::isUserNameTaken($name))
            {
                $errors['userName'] = 'Пользователь с таким логином уже существует';
            }

            if (empty($errors['userName']) && empty($errors['userPass']) && empty($errors['userPassConfirm'])) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $userData = User::addUser($name, $password);

                if ($userData) {
                    View::render('user/registrationSuccess');
                }

            } else {
                View::render('user/registration', ['errors' => $errors]);
            }

        } else {
            View::render('user/registration');
        }

    }

    public static function login(): void
    {
        if($_SERVER["REQUEST_METHOD"] === 'POST')
        {
            $name = trim($_POST['userName']) ?? '';
            $password = trim($_POST['userPass']) ?? '';

//            $errors = [];
            $errors['userName'] = empty($name) ? 'Это поле обязательно для заполнения' : '';
            $errors['userPass'] = empty($password) ? 'Это поле обязательно для заполнения' : '';



            if (empty($errors['userName']) && !User::isUserNameTaken($name))
            {
                $errors['userName'] = 'Такого пользователя не существует';
            }

            if (!empty($errors['userName']) || !empty($errors['userPass'])) {
                View::render('user/login', ['errors' => $errors]);
            } elseif (User::checkUserPassByUserName($name) != $password ) {
                $errors['userPass'] = 'Пароль для пользователя ' . $name . ' введен не верно';
                View::render('user/login', ['errors' => $errors]);
            } else {
                if (!empty($_SESSION['user'])) {
                    View::render('user/index');
                } else {
                    $_SESSION['user'] = $name;
                    View::render('user/index');
                }
            }

        } else {
            View::render('user/login');
        }

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


    public static function checkInputEnter($name, $password, $confirmPass): array
    {
        $errors['userName'] = empty($name) ? 'Это поле обязательно для заполнения' : '';
        $errors['userPass'] = empty($password) ? 'Это поле обязательно для заполнения' : '';
        $errors['userPassConfirm'] = empty($confirmPass) ? 'Это поле обязательно для заполнения' : '';

        // Проверка на несовпадение паролей
        if (empty($errors['userPass']) && empty($errors['userPassConfirm'])) {
            if ($password !== $confirmPass) {
                $errors['userPassConfirm'] = 'Пароли не совпадают';
            }
        }

        return $errors;
    }

    public static function redirect($url): void
    {
        header('Location: ' . $url);
        die();
    }

    public static function search()
    {

    }
}