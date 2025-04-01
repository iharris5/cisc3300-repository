<?php

namespace app\controllers;

use app\models\Post;

class PostController
{
	public function validatePost($inputData) {
        	$errors = [];
        	$title = $inputData['title'];
		$description = $inputData['description'];

		if ($title) {
			$title = htmlspecialchars($title, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            		if (strlen($title) < 2) {
                		$errors['titleShort'] = 'That title is too short';
           		}
        	} else {
            		$errors['requiredTitle'] = 'A title is required';
		}

		 if ($description) {
                        $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
                        if (strlen($description) < 2) {
                                $errors['descriptionShort'] = 'That description is too short';
                        }
                } else {
                        $errors['requiredDescription'] = 'A description is required';
		}

		if (count($errors)) {
            		http_response_code(400);
            		echo json_encode($errors);
            		exit();
        	}

		return [
			'title' => $title,
			'description' => $description,
		];
	}
		public function getAllPosts() {
        		$postModel = new Post();
        		header("Content-Type: application/json");
        		$posts = $postModel->getAllPosts();

        		echo json_encode($posts);
        		exit();
		 }

		public function getPostByID($id) {
        		$postModel = new Post();
        		header("Content-Type: application/json");
        		$post = $postModel->getPostById($id);
        		echo json_encode($post);
        		exit();
		}

		public function savePost() {
        		$inputData = [
            			'title' => $_POST['title'] ?: null,
           			'description' => $_POST['description'] ?: null,
        	];
        		$postData = $this->validatePost($inputData);

        		$post = new Post();
        		$post->savePost(
            			[
                			'title' => $postData['title'],
                			'description' => $postData['description'],
            			]
        		);

        		http_response_code(200);
        		echo json_encode([
            		'success' => true
        		]);
        		exit();
   		 }

		  public function updatePost($id) {
        		if (!$id) {
            			http_response_code(404);
            			exit();
        		}

        		//no built-in super global for PUT
        		parse_str(file_get_contents('php://input'), $_PUT);

        		$inputData = [
            			'title' => $_PUT['title'] ?: null,
            			'description' => $_PUT['description'] ?: null,
        		];
        		$postData = $this->validatePost($inputData);
    			//we could save the data off to be saved here

        		$post = new Post();
        		$post->updatePost(
            			[
                			'id' => $id,
                			'title' => $postData['title'],
                			'description' => $postData['description'],
            			]
        		);

        		http_response_code(200);
        		echo json_encode([
            			'success' => true
        		]);
        		exit();
    		}

    		public function deletePost($id) {
        		if (!$id) {
            			http_response_code(404);
            			exit();
        		}

        		$post = new Post();
        		$post->deletePost(
            			[
                			'id' => $id,
            			]
        		);

        		http_response_code(200);
        		echo json_encode([
            			'success' => true
        		]);
        		exit();
    		}

    		public function postsView() {
        		include '../public/assets/views/post/posts-view.html';
        		exit();
    		}

    		public function postsAddView() {
        		include '../public/assets/views/post/post-add.html';
       		 	exit();
    		}

    		public function postsDeleteView() {
        		include '../public/assets/views/post/posts-delete.html';
        		exit();
    		}

		public function postsUpdateView() {
        		include '../public/assets/views/post/posts-update.html';
        		exit();
		}
	}



			
