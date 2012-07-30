<?php 
session_start();

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
		
		$result = $db->lastInsertId();
		//var_dump($sql->errorInfo());
		$_SESSION['user_id'] = $result;
		
		var_dump($_SESSION);
		
		header('Location: main-pg.php');
		exit;
	}
}

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>Registration Form Validation</title>
	<meta name="viewport" content="width=device-width">
	<link href="css/general.css" rel="stylesheet">
</head>

<body>
	<div id="body-wrapper">
		<header>
			<h1><a href="index.php"><img src="images/logo.png" alt="Just Design logo"></a></h1>
			<!--<nav>
				<ul>
					<li><a href="create-list.html"> <strong> Create my List </strong> </a></li>
					<li><a href="#"><strong> My List </strong></a></li>
					<li><a href="#"><strong> Edit List </strong></a></li>
				</ul>
			</nav>-->
		</header>
	
		<div class="content">
			<div class="container">
				<div class="login-info">
					<div class="top-login">
						<img src="images/lock.jpg" alt="">
							<h2>Sign up:</h2>	
					</div>
					<div class="form-login">
						<form method="post" action="sign-up.php">
							 <div>
								<label for="email">
									<strong> Your Email </strong>
									<?php if (isset($errors['email'])): ?> 
									<strong class="error">is required</strong> 
									<?php endif; ?>
								</label>
								<input id="email" name="email" required value="<?php echo $email; ?>">
							</div>
							<button types="submit"><strong>Sign up</strong></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>