<?php

namespace php15\Models;

class Posts {
	public function getPosts() {

	$threePosts = [
		[
			'title' => '1st Post',
			'description' => 'Welp, this is the first post'
		],
		[
			'title' => '2nd Post',
			'description' => 'Now we got the second post here'
		],
		[
			'title' => '3rd Post',
			'description' => 'This right here is the third post'
		],
	];

	return $threePosts;
	}
}

