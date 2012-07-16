<?php

$errors = array();
$terms = filter_input(INPUT_POST, 'terms', FILTER_SANITIZE_STRING);


/*Validation*/

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	if (!isset($_POST['terms'])){
		$errors['terms'] = true;
	}
	if (strlen($terms) < 7 || strlen($terms) > 7)
    	$errors['terms'] = true;
}

