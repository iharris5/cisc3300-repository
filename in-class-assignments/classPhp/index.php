<?php 

$url = $_SERVER["REQUEST_URI"];

if ($url === '/html')
{
	echo '
		<div>
		<b>Yo, you are in the HTML</b>
		</div>
	';
}

else if ($url === '/json') 
{
	echo json_encode([
		'message' => 'You made it to the JSON!'
	]);
	exit();
}

?>
