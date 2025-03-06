<?php

namespace php15;

require "../php15/Controllers/PostsController.php";

use php15\Controllers\PostsController;

class Router {
	public function handleRoutes() {
	       $url = strtok($_SERVER["REQUEST_URI"], '?');

 	       $uriArray = explode("/", $url);

               $this->postRoutes($uriArray);
	}

	protected function postRoutes($uriArray) {
		if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
			$postController = new PostsController();
			$postController->getPosts();
		}
	}
}

