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
				<div class="about">
					<p><strong>This amazing application will make you excited and ready to exercise all the time.

It will spice up your routine every week and you will never be bored again.</strong></p>
					<ul>
						<li><strong>With this application, you can:</strong></li>
						<li>- Create a new list</li>
						<li> - Edit your list</li>
						<li> - View your list</li>
					</ul>
				</div>
			</div>
		</div>


<?php include 'includes/wrapper-bottom.php'; ?>