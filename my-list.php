<?php

/**
 * Small description of this file:
 * This is the page were the user can view there thist after creating a list
  * 
  * @author Souad Daou <souaddaou@gmail.com>
  * @copyright 2012 Souad Daou
  * @License BSD-3-Clause <http://opensource.org/licenses/BSD-3-Clause>
  * @version 1.0.0
  * @xercise planner
*/
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

$title = 'My List - ';
$page = 'list';
include 'includes/wrapper-top.php';
?>
	
		<div class="content">
			<div class="exercise-list-container">
				<fieldset>
				<legend><h2> <strong> My List </strong> </h2></legend>
					<div class="my-list">
							<?php foreach ($results as $exercise) : ?>
								<li><strong><?php echo $exercise['name_exercise']; ?></strong></li>
							<?php endforeach ?>
					</div>
				</fieldset>
			</div>
		</div>
	
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
		<!--<script src="js/my-list.js"></script>-->

<?php include 'includes/wrapper-bottom.php';?>