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
	<title>My List</title>
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
		<h1> <strong> My List </strong> </h1>
			<?php foreach ($results as $email) : ?>
		<h2>
		<a href="single.php?id=<?php echo $email['id']; ?>">
		<?php echo $email['exercise_id']; ?>
		</a>
		</h2>
		<?php endforeach ?>
		
	</div>

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	<!--<script src="js/my-list.js"></script>-->
</body>
</html>
