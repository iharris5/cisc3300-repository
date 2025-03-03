<?php

namespace php14\class;

class Cookie {
	public $name;
	public $price;

	public function __construct($name, $price) {
		$this->name = $name;
		$this->price = $price;
	}

	public function cookieInfo() {
		return json_encode([
			'name' => $this->name,
			'price' => $this->price,
		]);
	}
}
?>
