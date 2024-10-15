<?php

namespace App\controllers;

use App\models\Post;
use App\views\viewCore\View;

class PostController {
    public function index(): void {
        $allPosts = Post::getAllPosts();
        View::render('posts/index', ['posts' => $allPosts]);
    }

    public function show($id): void {
        $onePost = Post::getPost($id);
        View::render('posts/show', ['post' => $onePost]);
    }
}