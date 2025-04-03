<?php

namespace App\Models;

use App\Models\Model;

class Product extends Model {

	public function searchByName($name) {
		$query = "select * from merch where name like :name";
		return $this->query($query, [
			'name' => '%' . $name . '%'
		]);
	}
}
