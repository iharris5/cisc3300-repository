<?php

use Exception;

class ErrorResponse {
	public function handleError() {
		try {
			$num1 = 3;
			$num2 = 6;

			if ($num1 + $num2 == 9) {
				throw new Exception('Nah, I do not like this number.');
			}
		} catch (Exception $e) {
				echo 'Caught error: ' . $e->getMessage();
		} 
	}	
}

$response = new ErrorResponse();
$response->handleError();

?>
