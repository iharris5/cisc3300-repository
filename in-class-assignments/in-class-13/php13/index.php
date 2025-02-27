<?php
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === "hello" && $_SERVER['REQUEST_METHOD'] === 'GET') {
$hello = [
	'message' => 'Hi, this is some awesome php data being shown',
	'reply' => 'Hey, that is pretty awesome'
];

echo json_encode($hello);
exit();
}

else {
	require 'in-class-13.html';
}

?>
