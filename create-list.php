<?php
session_start();
require_once 'includes/db.php';
$errors = array();

//$user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT);
//print_r($_SESSION);
$checkbox = filter_input(INPUT_POST, 'checkbox', FILTER_SANITIZE_NUMBER_INT, FILTER_FORCE_ARRAY);
if (!is_array($checkbox)) $checkbox = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
// Validation for error //
		if (count($checkbox) != 7){
			$errors['checkbox'] = true;
		}
// Adding the checked boxes into the database //
		if (empty($errors)) {
			//print_r($checkbox);
			$sql = $db->prepare('
			INSERT INTO mep_exerciselist (exercise_id, user_id )
			VALUES (:exercise_id, :user_id)
			');
			foreach ($checkbox as $exercise) {
				$sql->bindValue(':exercise_id', $exercise, PDO::PARAM_INT);
				$sql->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
				$sql->execute();
			}
			//var_dump($db->errorInfo());
			header('Location: my-list.php');
			exit;
		}
// Deleting the existing data in the table //
		$sql = $db->prepare('
			DELETE FROM mep_exerciselist
			WHERE exercise_id = :exercise_id
			user_id = :user_id
		');
		//$sql->bindValue(':exercise_id', $exercise, PDO::PARAM_INT);
		$sql->bindValue(':exercise_id', $exercise, PDO::PARAM_INT);
		$sql->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
		//$sql->bindValue(':user_id', $user_id, PDO::PARAM_INT);
		$sql->execute();
}
// Getting the data from the table //
$sql = $db->prepare('
	SELECT  id, name_exercise
	FROM mep_exercises
');
$sql->execute();
$results = $sql->fetchALL();
//var_dump($db->errorInfo());
//print_r($results);


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
					<li id="signout"><a href="sign-out.php"><strong>Log out</strong></a></li>
				</ul>
			</nav>
		</header>
	
		<div class="content">
			<div class="exercise-list-container">
			<form method="post" actions="create-list.php">
				<fieldset>
					<legend><h2><strong>Choose 7 Exercise for your week: </strong></h2></legend>
					<?php if (isset($errors['checkbox'])): ?> <strong class="error">You must choose 7!</strong> <?php endif; ?>
					<div class="check-list">
						<label for="check">
								<?php foreach ($results as $exercise) : ?>
									<div class="check-box">
										<input type="checkbox" id="checkbox" name="checkbox[]" value="<?php echo $exercise['id']; ?>"<?php if (in_array($exercise['id'], $checkbox)) { echo ' checked'; } ?>>
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
				
				<?php print_r($checkbox); ?>
			</div>
		</div>
	</div>
</body>
</html>
