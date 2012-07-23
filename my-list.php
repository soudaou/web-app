<?php
session_start();
require_once 'includes/db.php';

$sql = $db->prepare('
	SELECT l.user_id, l.exercise_id, e.name_exercise
	FROM mep_exerciselist as l
	INNER JOIN mep_exercises as e
	ON l.exercise_id = e.id
	WHERE l.user_id = :user_id
');

$sql->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
// This will display the last error created by our database
// Should get rid of it as soon as you find your error
//var_dump($_SESSION);
//var_dump($db->errorInfo());

$sql->execute();
$results = $sql->fetchALL();

//print_r($results);

?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title>My List</title>
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
					<li><a href="sign-out.php"><strong>Log out</strong></a></li>
				</ul>
			</nav>
		</header>
	
		<div class="content">
			<div class="exercise-list-container">
				<h2> <strong> My List </strong> </h2>
				<div class="my-list">
						<?php foreach ($results as $exercise) : ?>
							<li><strong><?php echo $exercise['name_exercise']; ?></strong></li>
						<?php endforeach ?>
				</div>
			</div>
		</div>
	
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
		<!--<script src="js/my-list.js"></script>-->
	</div>
</body>
</html>
