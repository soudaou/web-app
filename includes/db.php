<?php

// Opens a connection to the MySQL database
// Shared between all the PHP file in our application

// Our username and password are kept in Environment Variables, in .htaccess
// This is for security
$user = getenv('MYSQL_USERNAME');		// The MySQL username
$pass = getenv('MYSQL_PASSWORD');		// The MySQL password
$host = getenv('MYSQL_DB_HOST');		// The MySQL db_host
$dbname = getenv('MYSQL_DB_NAME');		// The MYSQL db_name

//no spaces here at all!!
$data_source = sprintf('mysql:host=%s;dbname=%s',$host, $dbname);

// PDO: PHP Data Objects
// Allows us to connect to many different kinds of database
$db = new PDO($data_source, $user, $pass);

// Force the connection to commmunicate in UTF-8
// and support many human languages
$db->exec('SET NAMES utf8');