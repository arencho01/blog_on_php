<?php

namespace App\Controllers;

use App\models\Post;
use App\views\viewCore\View;

class PostController {
    public function index(): void {
        $allPosts = Post::getAllPosts();
        View::render('index', ['posts' => $allPosts]);
    }

    public function show($id): void {
        $onePost = Post::getPost($id);
//        var_dump($onePost);
        View::render('show', ['post' => $onePost]);
    }
}