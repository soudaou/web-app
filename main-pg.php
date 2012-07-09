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
	<header>
		<div class="logo">
			<a href="main-pg.php"><img src="images/logo1.png" alt="Just Design logo"></a>
		</div>
		<nav>
			<ul>
				<li><a href="create-list.html">Create my List</a></li>
				<li><a href="my-list.php">My List</a></li>
				<li><a href="edit-list.php">Edit List</a></li>
			</ul>
		</nav>
	</header>
	
	
	<div class="content">
		<p>Yay!! You can start by creating a new list</p>
		<p>You can also edite your list</p>
		<p>You can view your list</p>
	</div>


	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	<!--<script src="js/my-list.js"></script>-->
</body>
</html>
