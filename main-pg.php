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

include 'includes/wrapper-top.php';
?>
		
		
		<div class="content">
			<div class="main-pg-container">
				<p>1. Yay!! You can start by creating a new list</p>
				<p>2. You can also edite your list</p>
				<p>3. You can view your list</p>
			</div>
		</div>


<?php include 'includes/wrapper-bottom.php'; ?>