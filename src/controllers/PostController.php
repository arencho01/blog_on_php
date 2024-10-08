<?php

namespace Blog\controllers;

use Blog\core\Controller;
use Blog\core\View;
use Blog\models\Post;

class PostController extends Controller {
    public function index(): void {
        $allPosts = Post::getAllPosts();
        View::render('index', ['posts' => $allPosts]);
    }
}