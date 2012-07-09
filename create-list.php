<?php

require_once 'includes/db.php';

$sql = $db->query('
	SELECT id, email
	FROM mep_users
');
// This will display the last error created by our database
// Should get rid of it as soonas you find your error
//var_dump($db->errorInfo());

$results = $sql->fetchALL();
// The dino variable is for each iteration

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>My XERCISE Planner</title>
	<meta name="viewport" content="width=device-width">
	<link href="css/general.css" rel="stylesheet">
	
</head>

<body>
	<header>
		<div class="logo">
			<a href="index.php"><img src="images/logo1.png" alt="Just Design logo"></a>
		</div>
		<nav>
			<ul>
				<li><a href="create-list.html"> <strong> Create my List </strong> </a></li>
				<li><a href="#"><strong> My List </strong></a></li>
				<li><a href="#"><strong> Edit List </strong></a></li>
			</ul>
		</nav>
	</header>

	<div class="content">
	
		<h1> <strong> This application is for exercise fanatics </strong> </h1>
		<div class="content">
			<div class="container">
				<form method="post" action="index.php">
					 <div>
					 <h1>Sign in:</h1>
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
				<a href="sign-up.php"><img src="images/sign-up.png" alt=""></a>
			</div>
		</div>
		
	</div>

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	<!--<script src="js/my-list.js"></script>-->
</body>
</html>
