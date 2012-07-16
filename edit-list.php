<?php

require_once 'includes/db.php';
$errors = array();

$user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$name_exercise = filter_input(INPUT_POST, 'name_exercise', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!isset($_POST['terms'])){
		$errors['terms'] = true;
	}
	if (empty($errors)) {

		$sql = $db->prepare('
			UPDATE mep_exerciselist
			SET name_exercise = :name_exercise
			WHERE user_id = :user_id
		');
		$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
		$sql->bindValue(':name_exercise', $name_exercise, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: my-list.php');
		exit;
	}
}


else{
	$sql = $db->prepare('
		SELECT l.user_id, l.exercise_id, e.name_exercise
		FROM mep_exerciselist as l
		INNER JOIN mep_exercises as e
		ON l.exercise_id = e.id
		WHERE l.user_id = :user_id
');
	$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();
	
	//print_r($results);
	
	$user_id = $results['user_id'];
	$name_exercise = $results['name_exercise'];
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
					<li><a href="log-out.php"><strong>Log out</strong></a></li>
				</ul>
			</nav>
		</header>
	
		<div class="content">
			<div class="exercise-list">
					
			</div>
				<form method="post" actions="edit.php?id=<?php echo $name_exercise; ?> ">
					<fieldset>
						<legend>
							<h2><strong>Edit List: </strong></h2>
						</legend>
						<div>
						
						<label for="check">
						<?php foreach ($results as $name_exercise) : ?>
						<input type="checkbox" id="check" name="check" value="<?php echo $name_exercise; ?>">
							<p><?php echo $exercise['name_exercise']; ?></p>
						<?php endforeach ?>
			<!--            	Check 7 Exercises--> 
						<?php if (isset($errors['terms'])): ?> 
							<strong class="error">Must choose 7 exercises!</strong> 
						<?php endif; ?>
						</label>
						</div>
					</fieldset>
					<button type="submit">Update</button>
				
				</form>
		</div>
	
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
		<!--<script src="js/my-list.js"></script>-->
	</div>
</body>
</html>
