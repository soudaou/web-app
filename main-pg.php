<?php

require_once 'includes/db.php';

$sql = $db->query('
	SELECT id, email
	FROM mep_users
');

//var_dump($db->errorInfo());

$results = $sql->fetchALL();

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
		<<div id="body-wrapper">
			<header>
				<h1><a href="index.php"><img src="images/logo1.png" alt="Just Design logo"></a></h1>
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
			<div class="main-pg-container">
				<p>1. Yay!! You can start by creating a new list</p>
				<p>2. You can also edite your list</p>
				<p>3. You can view your list</p>
			</div>
		</div>

</div>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	<!--<script src="js/my-list.js"></script>-->
</body>
</html>
