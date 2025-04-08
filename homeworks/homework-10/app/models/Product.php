<?php

namespace app\models;

//using the database class namespace
use app\models\Model;

class Product extends Model {

    public function getAllProductsByNameOrPrice($name, $price) {
        $query = "select * from merch WHERE name like :name or title like :title";
        return $this->query($query, [
            'name' => '%' . $name . '%',
            'price' => '%' . $price . '%',
        ]);
    }

    public function getAllProducts() {
        $query = "select * from merch";
        return $this->query($query);
    }

    public function searchByName($name) {
	$query = "select * from merch where name like :name";
	return $this->query($query, [
		'name' => '%' . $name . '%'
	]);
    }

    public function saveProduct($inputData){
        $query = "insert into merch (name, price) values (:name, :price);";
        return $this->query($query, $inputData);
    }

    public function updateProduct($inputData){
        $query = "update merch set name = :name, price = :price where product_id = :product_id";
        return $this->query($query, $inputData);
    }

    public function deleteProduct($inputData){
        $query = "DELETE FROM merch where product_id = :product_id";
        return $this->query($query, $inputData);
    }
}
