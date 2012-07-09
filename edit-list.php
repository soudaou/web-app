<?php

require_once 'includes/db.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// ->prepare() allows us to have variables in our sql
// we can create placeholders and later fill them with some content
// By using prepare we are protecting against SQL injections attact
// PLaceholders are marked with a colon (:) in front of them
$sql = $db->prepare('
	SELECT id, email
	FROM mep_users
	WHERE id =  :id
');
// bindValue(placeholder, variable, datatype)
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
// if you are going to fetch one thing only you type only fetch(); rather than fetchALL();
$results = $sql->fetch();

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit List</title>
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
	
	
	<h1> <?php echo $results['dino_name']; ?></h1>
	<dl>
		<dt> Loves Meat </dt>
		<dd><?php echo $results['loves_meat']; ?></dd>

	</dl>
	
	<a href="edit.php?id=<?php echo $id; ?>"> Edit </a>
	<a href="delete.php?id=<?php echo $id; ?>"> Delete </a>
	
</body>
</html>