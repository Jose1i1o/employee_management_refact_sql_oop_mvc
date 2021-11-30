<?php

// CONNECTION WITH DATA BASE 

$dsn = "mysql:host=" . $_SERVER["SERVER_NAME"] . ";dbname=employeemngmt";
$dbusername = "root";
$dbpassword = "";

$db = new PDO($dsn, $dbusername, $dbpassword);
