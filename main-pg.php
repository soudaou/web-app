<?php

/**
 * Small description of this file:
 * This is the page is the main page
  * 
  * @author Souad Daou <souaddaou@gmail.com>
  * @copyright 2012 Souad Daou
  * @License BSD-3-Clause <http://opensource.org/licenses/BSD-3-Clause>
  * @version 1.0.0
  * @xercise planner
*/
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
				<h2>Welcome to the XERCISE app</h2>
				<p> Start by creating a list to follow for a week</p>
			</div>
		</div>


<?php include 'includes/wrapper-bottom.php'; ?>