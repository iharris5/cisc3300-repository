<?php

namespace app\controllers;

use app\models\Product;

class ProductController
{
	public function validateProduct($inputData) {
        	$errors = [];
		$name = $inputData['name'];
		$price = $inputData['price'];

		if ($name) {
			$name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            		if (strlen($name) < 2) {
                		$errors['nameShort'] = 'That name is too short';
           		}
        	} else {
            		$errors['requiredName'] = 'A name is required';
		}

		if ($price) {
                        $price = htmlspecialchars($price, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
                        if (strlen($price) < 2) {
                                $errors['priceShort'] = 'That price is too short';
                        }
                } else {
                        $errors['requiredPrice'] = 'A price is required';
		}

		if (count($errors)) {
            		http_response_code(400);
            		echo json_encode($errors);
            		exit();
        	}

		return [
			'name' => $name,
			'price' => $price,
		];

	}
		public function getAllProducts() {
        		$productModel = new Product();
        		header("Content-Type: application/json");
        		$products = $productModel->getAllProducts();

        		echo json_encode($products);
        		exit();
		 }

		public function searchByName($name) {
        		$productModel = new Product();
        		header("Content-Type: application/json");
        		$product = $productModel->searchByName($name);
        		echo json_encode($product);
        		exit();
		}

		public function saveProduct() {
        		$inputData = [
            			'name' => $_POST['name'] ?: null,
           			'price' => $_POST['price'] ?: null,
        	];
        		$productData = $this->validateProduct($inputData);

        		$product = new Product();
        		$product->saveProduct(
            			[
                			'name' => $productData['name'],
                			'price' => $productData['price'],
            			]
        		);

        		http_response_code(200);
        		echo json_encode([
            		'success' => true
        		]);
        		exit();
   		 }

		  public function updateProduct($product_id) {
        		if (!$product_id) {
            			http_response_code(404);
            			exit();
        		}

        		//no built-in super global for PUT
        		parse_str(file_get_contents('php://input'), $_PUT);

        		$inputData = [
            			'name' => $_PUT['name'] ?: null,
            			'price' => $_PUT['price'] ?: null,
        		];
        		$productData = $this->validateProduct($inputData);
    			//we could save the data off to be saved here

        		$product = new Product();
        		$product->updateProduct(
            			[
                			'product_id' => $product_id,
                			'name' => $productData['name'],
                			'price' => $productData['price'],
            			]
        		);

        		http_response_code(200);
        		echo json_encode([
            			'success' => true
        		]);
        		exit();
    		}

    		public function deleteProduct($product_id) {
        		if (!$product_id) {
            			http_response_code(404);
            			exit();
        		}

        		$product = new Product();
        		$product->deleteProduct(
            			[
                			'product_id' => $product_id,
            			]
        		);

        		http_response_code(200);
        		echo json_encode([
            			'success' => true
        		]);
        		exit();
    		}

    		public function productsView() {
        		include '../Public/assets/views/product/products-view.html';
        		exit();
    		}

    		public function productsAddView() {
        		include '../Public/assets/views/product/product-add.html';
       		 	exit();
    		}

    		public function productsDeleteView() {
        		include '../Public/assets/views/product/products-delete.html';
        		exit();
    		}

		public function productsUpdateView() {
        		include '../Public/assets/views/product/products-update.html';
        		exit();
		}
	}


