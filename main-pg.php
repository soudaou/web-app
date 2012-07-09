<?php

require_once 'includes/db.php';
require_once 'includes/form-processor.php';

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
<!--		<h1><a href="index.html"><img src="images/logo.png" alt="Just Design logo"></a></h1>
-->		<nav>
			<ul>
				<li><a href="create-list.html">Create my List</a></li>
				<li><a href="#">My List</a></li>
				<li><a href="#">Edit List</a></li>
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
