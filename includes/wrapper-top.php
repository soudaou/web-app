<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<title><?php echo $title;?> My XERCISE Planner</title>
	<meta name="viewport" content="width=device-width">
	<link href="css/general.css" rel="stylesheet">
	
</head>

<body>
	
		<div id="body-wrapper">
			<header>
			<div id="header-wrapper">
				<h1<?php if ($page == 'home') { ?> class="current" <?php } ?>><a href="main-pg.php"><img src="images/logo.png" alt="Just Design logo"></a></h1>
				<nav>
					<ul>
						<li<?php if ($page == 'about') { ?> class="current" <?php } ?>><a href="about.php"> <strong> About </strong> </a></li>
						<li<?php if ($page == 'create') { ?> class="current" <?php } ?>><a href="create-list.php"> <strong> Create my List </strong> </a></li>
						<li<?php if ($page == 'list') { ?> class="current" <?php } ?>><a href="my-list.php"><strong> My List </strong></a></li>
						<li<?php if ($page == 'edit') { ?> class="current" <?php } ?>><a href="edit-list.php"><strong> Edit List </strong></a></li>
						<li<?php if ($page == 'logout') { ?> class="current" <?php } ?>><a href="sign-out.php"><strong>Log out</strong></a></li>
					</ul>
				</nav>
				</div>
			</header>