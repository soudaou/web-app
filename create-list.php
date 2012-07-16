<?php

require_once 'includes/db.php';
//require_once 'includes/form-processor.php';

$sql = $db->prepare('
	SELECT  id, name_exercise
		FROM mep_exercises
');

//var_dump($db->errorInfo());
$sql->execute();
$results = $sql->fetchALL();

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
					<li><a href="log-out.php"><strong>Log out</strong></a></li>
				</ul>
			</nav>
		</header>
	
		<div class="content">
			<div class="exercise-list-container">
			<form method="post" actions="add.php">
				<fieldset>
					<legend>
						<h2><strong>Choose 7 Exercise for your week: </strong></h2>
						<?php if (isset($errors['exerciseCheck'])): ?> 
						<strong class="error">Must choose 7!</strong> 
						<?php endif; ?>
					</legend>
					
					<div class="check-list">
						<label for="check">
								<?php foreach ($results as $exercise) : ?>
								
									<div class="check-box">
										<input type="checkbox" id="checkbox" name="checkbox" vale="1">
									</div>
									<div class="exercise-list">
										<ul>
											<li><strong><?php echo $exercise['name_exercise']; ?></strong></li>
										</ul>
									</div>
								<?php endforeach ?>
							
							<?php if (isset($errors['terms'])): ?> 
								<strong class="error">Must choose 7 exercises!</strong> 
							<?php endif; ?>
						</label>
					</div>
				</fieldset>
					<button type="submit">Save</button>
				</form>
			</div>
		</div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="js/form-validation.js"></script>
</body>
</html>
