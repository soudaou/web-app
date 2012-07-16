<?php
require_once 'includes/db.php';

$errors = array();

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] =='POST') {
	if (empty($email)) {
		$errors['email'] = true;
	}
	
	if (empty($errors)) {
		$sql = $db->prepare('
		SELECT id, email
		FROM mep_users
		WHERE email = :email
		LIMIT 1
	');
	$sql->bindValue(':email', $email, PDO::PARAM_STR);
	$sql->execute();
	$user = $sql->fetch();
	
	if (empty($user)) {
		header('Location: sign-up.php');
		exit;
	}
		$user_id = $user['id'];	
		if ($user_id) {
			session_regenerate_id();
			$_SESSION['user_id'] = $user_id;
			header('Location: main-pg.php' );
			exit;
			//redirect back to the page they came from
		} 
		else {
			$errors['no-user'] = true;
		}
	}
}

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>My XERCISE Planner</title>
	<meta name="viewport" content="width=device-width">
	<link href="css/general.css" rel="stylesheet">
	
</head>

<body>
	<div id="body-wrapper">
		<header>
			<div class="logo">
				<a href="index.php"><img src="images/logo1.png" alt="Just Design logo"></a>
			</div>
			<nav>
				<ul>
					<li><a href="create-list.php"> <strong> Create my List </strong> </a></li>
					<li><a href="my-list.php"><strong> My List </strong></a></li>
					<li><a href="edit-list.php"><strong> Edit List </strong></a></li>
				</ul>
			</nav>
		</header>

		<div class="content">
			<h1> <strong> This application is for exercise fanatics </strong> </h1>
			<div class="container">
				<div class="login-info">
					<div class="top-login">
						<img src="images/lock.jpg" alt="">
						<h2>Sign in:</h2>	
					</div>
					<div class="form-login">
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
							<p>If you are a new user, <a href="sign-up.php"><strong>click here</strong></a> to register</p>
							<button types="submit"><strong>Sign in</strong></button>
						</form>
		<!--			<a href="sign-up.php"><img src="images/sign-up.png" alt=""></a> -->
					</div>
				</div>
			</div>
		</div>

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	<!--<script src="js/my-list.js"></script>-->
	</div>
</body>
</html>
