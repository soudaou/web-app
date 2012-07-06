<?php

// Opens a connection to the MySQL database
// Shared between all the PHP file in our application

// Our username and password are kept in Environment Variables, in .htaccess
// This is for security
$user = getenv('DB_USER');	// The MySQL username
$pass = getenv('DB_PASS');	// The MySQL password
//no spaces here at all!!
$data_source = getenv('DATA_SOURCE');

// PDO: PHP Data Objects
// Allows us to connect to many different kinds of database
$db = new PDO($data_source, $user, $pass);

// Force the connection to commmunicate in UTF-8
// and support many human languages
$db->exec('SET NAMES utf8');