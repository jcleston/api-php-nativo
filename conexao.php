<?php
include_once('config.php');
$host = HOST;
$port = PORT;
$dbname = DBNAME;
$user = USER;
$pass = PASS;

$conn = new PDO("pgsql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
