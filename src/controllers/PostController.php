<?php

namespace Blog\Controllers;

use Blog\Models\Post;

class PostController {
    public function index() {
        $allPosts = new Post();
        return (new Post())->getPosts();
    }
}