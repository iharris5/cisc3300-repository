<?php 

namespace App\Models;

class Post extends Model {
	public function getPosts() {
		$query = "select * from posts";
		return $this->fetchAll($query);
	}
}

