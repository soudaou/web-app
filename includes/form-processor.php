<?php

$errors = array();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


/*Validation*/

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	//to validate the email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors['email'] = true;
	}

}