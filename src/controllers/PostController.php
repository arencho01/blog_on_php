<?php

namespace App\controllers;

use App\models\Post;
use App\services\Validator;
use App\views\View;

class PostController {
    public function index(): void {
        $allPosts = Post::getAllPosts();
        View::render('posts/index', ['posts' => $allPosts]);
    }

    public function show($id): void {
        $onePost = Post::getPost($id);
        View::render('posts/show', ['post' => $onePost]);
    }

    public static function search(): void
    {
        $query = trim($_POST['searchInput']);
        $query = htmlspecialchars($query, ENT_QUOTES);

        $err = '';

        if (empty($query)) {
            $err = 'Вначале введите запрос';
        } elseif (strlen($query) < 5) {
            $err = "Запрос должен состоять минимум из 5 символов";
        } elseif (strlen($query) > 50) {
            $err = "Запрос должен быть менее 50-ти символом";
        }

        if  ($err) {
            View::render('posts/search', ['err' => $err]);
        } elseif(Post::searchPosts($query)) {
            View::render('posts/search', ['posts' => Post::searchPosts($query)]);
        }

    }

    public static function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = htmlspecialchars(trim($_POST['post-title']), ENT_QUOTES) ?? '';
            $content = htmlspecialchars(trim($_POST['post-text']), ENT_QUOTES) ?? '';

            $errors = Validator::validatePostAddFields($title, $content);

            if (empty($errors)) {
                $lastPostId = Post::addPost($title, $content)['LAST_INSERT_ID()'];

                $post = Post::getPost($lastPostId);
                View::render('posts/show', ['post' => $post]);
                exit();
            } else {
                View::render('posts/add', ['errors' => $errors]);
            }

        }

        View::render('posts/add');
    }


}