<?php
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === "cookies" && $_SERVER['REQUEST_METHOD'] === 'GET') {
	$merch = [
		[
			'name' => 'Cookie Eaters Mug:',
			'price' => '499.99'
		],
		[
			'name' => 'Cookie Tee:',
			'price' => '799.99'
		]
	];
	
	echo json_encode($merch);
	exit();
}

?>
