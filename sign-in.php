<?php 

require_once 'includes/form-processor.php';

$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_NUMBER_INT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (strlen($email) < 1 || strlen($email) > 256) {
		$errors['email'] = true;
	}

	if (empty($errors)) {
		
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
			INSERT INTO mep-users (email)
			VALUES (:email)
		');
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->bindValue(':email', $email, PDO::PARAM_INT);
		$sql->execute();
		
		header('Location: main-pg.php');
		exit;
	}
}

else{
	$sql = $db->prepare('
		SELECT email
		FROM mep_users
		WHERE id = :id
	');
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();
	
	$email = $results['email'];
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
    
	<form method="post" action="index.php">
         <div>
            <label for="email">
            	<strong> Email </strong>
				<?php if (isset($errors['email'])): ?> 
            	<strong class="error">is required</strong> 
				<?php endif; ?>
            </label>
            <input id="email" name="email" required value="<?php echo $email; ?>">
        </div>

        <button types="submit">Sign In</button>
    </form>
</body>
</html>