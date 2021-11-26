<?php

// CONNECTION WITH DATA BASE 

$dsn = "mysql:host=".$_SERVER["SERVER_NAME"].";dbname=employeemngmt";
$dbusername ="root";
$dbpassword = "jose3005";

$db = new PDO($dsn, $dbusername, $dbpassword);
