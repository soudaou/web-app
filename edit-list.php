<?php
/**
 * Small description of this file:
 * This is the page were the user can edit there list
  * 
  * @author Souad Daou <souaddaou@gmail.com>
  * @copyright 2012 Souad Daou
  * @License BSD-3-Clause <http://opensource.org/licenses/BSD-3-Clause>
  * @version 1.0.0
  * @xercise planner
*/
session_start();
require_once 'includes/db.php';
$errors = array();

$checkbox = filter_input(INPUT_POST, 'checkbox', FILTER_SANITIZE_NUMBER_INT, FILTER_FORCE_ARRAY);
if (!is_array($checkbox)) $checkbox = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
// Validation for error //
		if (count($checkbox) != 7){
			$errors['checkbox'] = true;
		}
		if (empty($errors)) {
		// Deleting the existing data before enering new data into table //
		$sql = $db->prepare('
			DELETE FROM mep_exerciselist
			WHERE user_id = :user_id 
		');
		$sql->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
		$sql->execute();
		// Adding the checked boxes into the database //
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
}
		$sql = $db->prepare('
		SELECT  id, name_exercise
		FROM mep_exercises
		');

$sql->execute();
$results = $sql->fetchALL();
//var_dump($db->errorInfo());
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

$title = 'Edit your List - ';
$page = 'edit';
include 'includes/wrapper-top.php';
?>
	
		<div class="content">
			<div class="exercise-list-container">
				<form method="post" actions="edit-list.php">
				<fieldset>
					<legend><h2><strong>Edit your List: </strong></h2></legend>
					<?php if (isset($errors['checkbox'])): ?> <strong class="error">You must choose 7!</strong> <?php endif; ?>
					<div class="check-list">
						<label for="check">
								<?php foreach ($results as $exercise) : ?>
									<div class="check-box">
										<input type="checkbox" id="checkbox" name="checkbox[]" value="<?php echo $exercise['id']; ?>" <?php if (in_array($exercise['id'], $checkbox)) { echo ' checked'; } ?> <?php if (in_array($exercise['id'], $user_exercise_ids)) : ?>checked<?php endif; ?>>
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
		</div>

<?php include 'includes/wrapper-bottom.php';?>
