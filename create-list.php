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
			<fieldset>
            <legend>
            	<strong>Choose 7 Exercise: </strong>
                <?php if (isset($errors['preferredlang'])): ?> 
            	<strong class="error">Must choose 7!</strong> 
				<?php endif; ?>
            </legend>
            <input type="radio" id="english" name="preferredlang" value="english">
            <label for="english">English</label>
                
            <input type="radio" id="french" name="preferredlang" value="french">
            <label for="french">French</label>
                
            <input type="radio" id="spanish" name="preferredlang" value="spanish">
            <label for="spanish">Spanish</label>
        </fieldset>
		</div>
		
	</div>

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	<!--<script src="js/my-list.js"></script>-->
</body>
</html>
