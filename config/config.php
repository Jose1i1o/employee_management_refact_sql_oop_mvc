<?php

define("BASE_PATH", '.');

define("LIBS", BASE_PATH . '/libs');

define("CONTROLLERS", BASE_PATH . '/controllers');

define("VIEWS", BASE_PATH . '/views');

define("MODELS", BASE_PATH . '/models');

define('PROTOCOL', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://');
define('DOMAIN', $_SERVER['HTTP_HOST']);
define('BASE_URL', preg_replace("/\/$/", '', PROTOCOL . DOMAIN . str_replace(array('\\', "index.php", "index.html"), '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))), 1) . '/');
define('CSS', BASE_URL . '/assets/css');

////BASE URL -> FOR LINK CSS$uri = $_SERVER['REQUEST_URI'];
// if (isset($uri) && $uri !== null) {
//     $uri = substr($uri, 1);
//     $uri = explode('/', $uri);
//     $uri = "http://$_SERVER[HTTP_HOST]" . "/" . $uri[0];
// } else {
//     $uri = null;
// }
// define("BASE_URL", $uri);