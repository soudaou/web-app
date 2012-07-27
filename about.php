<?php
session_start();
require_once 'includes/db.php';

$title = 'Home - ';
$page = 'home';
/*
$sql = $db->query('
	SELECT id, email
	FROM mep_users
');
*/
//var_dump($_SESSION);
//var_dump($db->errorInfo());
//$results = $sql->fetchALL();


$title = 'About - ';
$page = 'about';
include 'includes/wrapper-top.php';
?>
		
		
		<div class="content">
			<div class="main-pg-container">
			<p>This web application is for those who want to stick to a schedule</p>
				<p>With this app, you can:</p>
				<p>Create a new list</p>
				<p> Edit your list</p>
				<p> View your list</p>
			</div>
		</div>


<?php include 'includes/wrapper-bottom.php'; ?>