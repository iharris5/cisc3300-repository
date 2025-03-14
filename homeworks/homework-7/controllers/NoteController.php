<?php

class NoteController
{
	public function newNote() {
		$title = $_POST['title'] ?? null;
		$description = $_POST['description'] ?? null;
		$errors = [];
		$success = false;

		if ($title) {
			$title = htmlspecialchars($title);
			
			echo ($title);
			echo '<br>';
			echo htmlspecialchars(htmlspecialchars($title));

			if (strlen($title) <= 3) {
				$errors['title'] = 'Not enough characters, more than 3 are needed';
			} else {
				$errors['title'] = 'You must have a title';
			}
		}

		if ($description) {
                        $description = htmlspecialchars($description);

                        echo ($description);
                        echo '<br>';
                        echo htmlspecialchars(htmlspecialchars($description));

                        if (strlen($description) <= 10) {
                                $errors['description'] = 'Not enough characters, more than 10 are needed';
                        } else {
                                $errors['description'] = 'You absolutely need a description';
                        }
		}

		if (count($errors)) {
			http_response_code(400);
			echo json_encode($errors);
			exit();
		}

		$success = true;
		require 'views/newNote.html';
	}
}

