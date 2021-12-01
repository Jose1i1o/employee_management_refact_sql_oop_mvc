<?php

require_once('./config/dbh.php');
require_once('./config/constants.php');

if (isset($_GET['controllers'])) {
  $controllers = getControllerPath($_GET['controllers']);

  $fileExist = file_exists($controllers);
  if ($fileExist) {
    require_once $controllers;
  } else {
    $errorMsg = "The page you are trying to access does not exist";
    require_once VIEWS . "/error/error.php";
  }
} else {
  require_once VIEWS . "/login/login.php";
}

function getControllerPath($param)
{
  return CONTROLLERS . $param . 'Controller.php';
}
