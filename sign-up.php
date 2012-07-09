<?php 

require_once 'includes/form-processor.php';

$errors = array();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (strlen($email) < 1 || strlen($email) > 256) {
		$errors['email'] = true;
	}

	if (empty($errors)) {
		
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
			INSERT INTO mep_users (email)
			VALUES (:email)
		');
		$sql->bindValue(':email', $email, PDO::PARAM_STR);
		$sql->execute();
		//var_dump($sql->errorInfo());
		header('Location: main-pg.php');
		exit;
	}
}

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>Registration Form Validation</title>
	<link href="css/general.css" rel="stylesheet">
</head>

<body>

	<h1>Sign up:</h1>
    
	<form method="post" action="sign-up.php">
         <div>
            <label for="email">
            	<strong> Email </strong>
				<?php if (isset($errors['email'])): ?> 
            	<strong class="error">is required</strong> 
				<?php endif; ?>
            </label>
            <input id="email" name="email" required value="<?php echo $email; ?>">
        </div>

        <button types="submit">Sign Up</button>
    </form>
</body>
</html>