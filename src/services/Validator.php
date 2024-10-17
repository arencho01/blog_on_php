<?php

namespace App\services;

use App\models\User;

class Validator
{
    public static function validateRegisterFields($name, $password, $confirmPass): array
    {
        $errors = [];

        if (empty($name)) {
            $errors['userName'] = 'Это поле обязательно для заполнения';
        }

        if (empty($confirmPass)) {
            $errors['userPassConfirm'] = 'Это поле обязательно для заполнения';
        }

        if (empty($password)) {
            $errors['userPass'] = 'Это поле обязательно для заполнения';
        } elseif ($password != $confirmPass) {
            $errors['userPassConfirm'] = 'Пароли не совпадают';
        }

        return $errors;
    }

    public static function validatePostAddFields($title, $content): array
    {
        $errors = [];

        if (empty($title)) {
            $errors['title'] = 'Заголовок обязателен';
        } elseif (strlen($title) < 5) {
            $errors['title'] = 'Заголовок должен быть не менее 5-ти символов';
        } elseif (strlen($title) > 100) {
            $errors['title'] = 'Заголовок должен быть не более 100 символов';
        }

        if (empty($content)) {
            $errors['content'] = 'Заполните содержание статьи';
        } elseif (strlen($content) < 50) {
            $errors['content'] = 'Содержание статьи не должно быть менее 50-ти символов';
        } elseif (strlen($content) > 500) {
            $errors['content'] = 'Содержание статьи не должно быть более 500-символов';
        }

        return $errors;
    }

    public static function validateLoginFields($name, $password): array
    {
        $errors = [];

        if (empty($name)) {
            $errors['userName'] = 'Это поле обязательно для заполнения';
        } elseif (!User::isUserNameTaken($name)) {
            $errors['userName'] = 'Пользователя с таким логином не существует';
        }

        if (empty($password)) {
            $errors['userPass'] = 'Это поле обязательно для заполнения';
        }

        return $errors;
    }

    public static function sanitizeInput($input): string
    {
        return htmlspecialchars(trim($input), ENT_QUOTES);
    }

//    public static function checkInputEnter($name, $password, $confirmPass): array
//    {
//        $errors['userName'] = empty($name) ? 'Это поле обязательно для заполнения' : '';
//        $errors['userPass'] = empty($password) ? 'Это поле обязательно для заполнения' : '';
//        $errors['userPassConfirm'] = empty($confirmPass) ? 'Это поле обязательно для заполнения' : '';
//
//        // Проверка на несовпадение паролей
//        if (empty($errors['userPass']) && empty($errors['userPassConfirm'])) {
//            if ($password !== $confirmPass) {
//                $errors['userPassConfirm'] = 'Пароли не совпадают';
//            }
//        }
//
//        return $errors;
//    }
}