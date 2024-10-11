<?php

namespace App\controllers;

use App\models\User;
use App\views\viewCore\View;

class UserController
{
    public function registration(): void
    {
        if($_SERVER["REQUEST_METHOD"] === 'POST')
        {
            $name = trim($_POST['userName']) ?? '';
            $password = trim($_POST['userPass']) ?? '';
            $confirmPass = trim($_POST['userPassConfirm']) ?? '';

            var_dump($name);

            $errors = self::checkInputEnter($name, $password, $confirmPass);
            var_dump($errors);

            View::render('user/registration', ['errors' => $errors]);
        }

        View::render('user/registration');
    }

//    public function isPostRequest()
//    {
//        var_dump($_SERVER['REQUEST_METHOD']);
//        if()
//        {
//            View::render('user/registration');
//        };
//    }

    public function registrationSuccess(): void
    {
        View::render('user/registrationSuccess');
    }

    public function checkRegistration(): void
    {

        $data = [];
//        var_dump($_POST);
    }

    public function checkInputEnter($name, $password, $confirmPass): array
    {

        $errors['userName'] = !empty($name);
//        $errors['userPass'] = !empty($password);
//        $errors['userPassConfirm'] = !empty($confirmPass);

        if (!empty($confirmPass) && !empty($password)) {
            if ($password != $confirmPass) {
                $errors['userPassConfirm'] = 'Пароли не совпадают';
            } else {
                $errors['userPassConfirm'] = 'Это поле обязательно для заполнения';
            }
        }
//        else {
//            if ($confirmPass != $password) {
//                $errors['userPassConfirm'] = 'Пароли не совпадают';
//            }
//        }
        var_dump('confirmPass:', $confirmPass);


//        if ($errors['userPass'] && $errors['userPassConfirm']) {
//            if ($errors['userPass'] === $errors['userPassConfirm']) {
//                $errors['userPassMatch'] = true;
//            } else {
//                $errors['userPassMatch'] = false;
//            }
//        }

        return $errors;
    }

//    public function passwordMatch()
//    {
//
//    }

}