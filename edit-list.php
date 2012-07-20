<?php
session_start();
require_once 'includes/db.php';
$errors = array();

$checkbox = filter_input(INPUT_POST, 'checkbox', FILTER_SANITIZE_NUMBER_INT, FILTER_FORCE_ARRAY);
if (!is_array($checkbox)) $checkbox = array();
/*Validation*/

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		if (count($checkbox) != 7){
			$errors['checkbox'] = true;
		}
		if (empty($errors)) {
			$sql = $db->prepare('
			INSERT INTO mep_exerciselist (name_exercise, id )
			VALUES (:name_exercise, :id :)
			');
			$sql->bindValue(':name_exercise', $name_exercise, PDO::PARAM_STR);
			$sql->bindValue(':id', $id, PDO::PARAM_INT);
			$sql->execute();
			var_dump($db->errorInfo());
			header('Location: my-list.php');
			exit;
		}
}

		$sql = $db->prepare('
		SELECT  id, name_exercise
		FROM mep_exercises
		');

//var_dump($db->errorInfo());
$sql->execute();
$results = $sql->fetchALL();

//print_r($results);

		$sql = $db->prepare('
		SELECT l.user_id, l.exercise_id, e.name_exercise
		FROM mep_exerciselist as l
		INNER JOIN mep_exercises as e
		ON l.exercise_id = e.id
		WHERE l.user_id = :user_id
		');
		$sql->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
$sql->execute();
$userex = $sql->fetchALL();

$user_exercise_ids = array();
foreach ($userex as $ue) {
$user_exercise_ids[] = $ue['exercise_id'];
}
//print_r($userex);


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
				<form method="post" actions="edit-list.php">
				<fieldset>
					<legend><h2><strong>Choose 7 Exercise for your week: </strong></h2></legend>
					<?php if (isset($errors['checkbox'])): ?> <strong class="error">You must choose 7!</strong> <?php endif; ?>
					<div class="check-list">
						<label for="check">
								<?php foreach ($results as $exercise) : ?>
								
									<div class="check-box">
										<input type="checkbox" id="checkbox" name="checkbox" value="1" <?php if (in_array($exercise['id'], $user_exercise_ids)) : ?>checked<?php endif; ?>>
									</div>
									<div class="exercise-list">
										<ul>
											<li><strong><?php echo $exercise['name_exercise']; ?></strong></li>
										</ul>
									</div>
								<?php endforeach ?>

						</label>
					</div>
				</fieldset>
					<button type="submit">Save</button>
				</form>
		</div>
	
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
		<!--<script src="js/my-list.js"></script>-->
	</div>
</body>
</html>
