<?php

namespace php15\Controllers;

require "../php15/Models/Posts.php";

use php15\Models\Posts;

class PostsController {
	public function getPosts() {
		$postModel = new Posts();
		$posts = $postModel->getPosts();
		echo json_encode($posts);
		exit();
	}
}
