<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController {
	public function searchByName($name) {
		$productModel = new Product();
		header("Content-Type: application/json");

		if (!$name) {
			echo json_encode(['error' => 'You must input a product name']);
			exit();
		}
		$products = $productModel->searchByName($name);

		if ($products) {
			echo json_encode($products);
		} else {
			echo json_encode(['message' => 'No products found.']);
		}
		exit();
	}
}

