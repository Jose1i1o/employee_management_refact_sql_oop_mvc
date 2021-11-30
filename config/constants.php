<?php

define("BASE_PATH", '.');

define("LIBS", BASE_PATH . '/libs');

define("CONTROLLERS", BASE_PATH . '/controllers');

define("VIEWS", BASE_PATH . '/views');

define("MODELS", BASE_PATH . '/models');

define('PROTOCOL', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://');
define('DOMAIN', $_SERVER['HTTP_HOST']);
define('BASE_URL', preg_replace("/\/$/", '', PROTOCOL . DOMAIN . str_replace(array('\\', "index.php", "index.html"), '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))), 1) . '/');
define('CSS', BASE_URL . '/public/assets/css');
