<?php

namespace App\Controllers;

use App\Models\Post;

class PostController
{
    public function getPosts() {
        $postModel = new Post();
        header("Content-Type: application/json");
        $query = !empty($_GET['title']) ? $_GET['title'] : null;
        $posts = $postModel->getPosts($query);
	
        echo json_encode($posts);
        exit();
    }
}
