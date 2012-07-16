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
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();
	
	$user_id = $results['user_id'];
	$name_exercise = $results['name_exercise'];
}


?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit the list</title>
</head>

<body>
	
	<h1>Edit the list:</h1>
	
	<form method="post" actions="edit.php?id=<?php echo $id; ?> ">
		<div>
			<label for="name_exercise"> 
			Name Exercise 
			<?php if (isset($errors['name_exercise'])) : ?>
			<strong class="errors"> is required </strong>
			<?php endif; ?>
			</label>
			<input id="name_exercise" name="name_exercise" required value="<?php echo $name_exercise; ?>">
		</div>

		<button type="submit"> Update </button>
		
	</form>


</body>
</html>