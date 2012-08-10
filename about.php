<?php

/**
 * Small description of this file:
 * This is the page were the user can learn more about the web application
  * 
  * @author Souad Daou <souaddaou@gmail.com>
  * @copyright 2012 Souad Daou
  * @License BSD-3-Clause <http://opensource.org/licenses/BSD-3-Clause>
  * @version 1.0.0
  * @xercise planner
*/
session_start();
require_once 'includes/db.php';

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
				<div class="about">
					<p><strong>This amazing application will get you all ready to exercise.
					It will mix up your routine every week and you will never be bored again.</strong></p>
					<ul>
						<li><strong>With this application, you can:</strong></li>
						<li> - Create a new list</li>
						<li> - Edit your list</li>
						<li> - View your list</li>
					</ul>
				</div>
			</div>
		</div>


<?php include 'includes/wrapper-bottom.php'; ?>