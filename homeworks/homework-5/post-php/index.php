<?php

header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
	echo json_encode([
		[
        		'message' => 'Yep, that was totes a success'
		]
    ]);
    exit();
}

?>

